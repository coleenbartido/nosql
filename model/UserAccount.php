<?php

	require '../vendor/autoload.php'; //Load the library for Mongodb 

class UserAccount {

	public $userID;
	public $username;
	public $password;

	public $connection;
	

	// public function __construct($userID, $username, $password)  
 //    {  
 //        $this->userID = $userID;
	//     $this->username = $username;
	//     $this->password = $password;
 //    } 

	public function __construct() 
	{
		$this->connection = new MongoDB\Client("mongodb://localhost:27017");
	}

    public function getUser($email, $password)
    {

		$db = $this->connection->bloog;
    	$collection = $db->users;

        // $result = $collection->findOne(
        //     array(
        //         'email' => $email,
        //         'password' => md5($password) 
        //     )
        // );

        $checker = $collection->findOne(
            array(
               '$or' => array(
                     0 =>
                          array('email' => $email, "password"=>md5($password)),
                     1 =>
                         array('username' => $email, "password"=>md5($password)),
                    )
                )
            );

		return $checker;
    }

    public function registerUser($username, $email, $password, $name)
    {
    	try {

    		$db = $this->connection->bloog;
    		$collection = $db->users;

    		$userDocument = array("email" => $email, "username" => $username, "password"=> md5($password), "name"=>$name, "following" => array(), "followers" => array());

            $checker = $collection->findOne(
            array(
               '$or' => array(
                     0 =>
                          array('email' => $email),
                     1 =>
                         array('username' => $username),
                    )
                )
            );

    		if($checker != NULL)
    		{
    			return false;
    		}
    		else
    		{
    			$collection->insertOne($userDocument);
    			return true;
    		}

    	} 
    	catch (MongoConnectionException $e) 
    	{
        	die('Error connecting to MongoDB server');
    	} 
    	catch (MongoException $e) 
    	{
        	die('Error: ' . $e->getMessage());
    	}


    }

    public function getFollowing($objectID, $email)
    {
    	$db = $this->connection->bloog;
		$collection = $db->users;

		$followingList = $collection->find();

        
    }

    public function followUser($username, $userID)
    {

        $db = $this->connection->bloog;
        $collection = $db->users;



        //update two users

        $loggedInUserID = $_SESSION['userID'];
        $loggedInUsername = $_SESSION['username'];


        //update FOLLOWING list of currently LOGGED IN USER

        //$followingUpdate = array('$push' => array('following.$.id' => $followID));
        $followingQuery = array("_id" => $loggedInUserID);
        $followingUpdate = array('$push' => array('following' => array( "username" => $username)));
        $collection->updateOne($followingQuery, $followingUpdate);

        //update FOLLOWERS LIST of FOLLOWED USER
        //$followerUpdate = array('$push' => array('followers.$.id' => $followID));
        $followerQuery = array("_id" => new MongoDB\BSON\ObjectId($userID));
        $followerUpdate = array('$push'=> array('followers' => array( "username" => $loggedInUsername)));
        $collection->updateOne($followerQuery, $followerUpdate);

    }
}

?>