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

		$userAccount = $collection->findOne(
    		array(
    			'$or' => array(
    					0 =>
  						array('email' => $email, 'password' => $password),
  						1 =>
  						array('username' => $email, 'password' => $password),
					)
				)
		);

		//var_dump($userAccount);

		return $userAccount;
    }

    public function registerUser($username, $email, $password)
    {
    	try {

    		$db = $this->connection->bloog;
    		$collection = $db->users;

    		$userDocument = array("email" => $email, "username" => $username, "password"=> $password);

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
    	$db = $connection->bloog;
		$collection = $db->users;

		$followingList = $collection->find();

        
    }

    public function followUser($followID)
    {
        $db = $connection->bloog;
        $collection = $db->users;

        //update two users

        $userID = $_SESSION['userID'];
        $followingQuery = array("_id" => $userID);
        $followingUpdate = array('$push' => array('following.$.id' => $followID));

        $collection->update($followingQuery, $followingUpdate);

        $followerQuery = array("_id" => $followID);
        $followerUpdate = array('$push' => array('followers.$.id' => $followID));

    }
}

?>