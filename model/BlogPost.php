<?php

	//session_start();
	require '../vendor/autoload.php'; 
    session_start();

class BlogPost {
	public $userID;
    public $postID;
	public $author;
	public $timestamp;
	public $title;
	public $blogPost;

	public $connection;
	
	public function __construct(/*$userID, $author, $timestamp, $title, $blogPost*/)  
    {  
     //    $this->userID = $userID;
	    // $this->author = $author;
	    // $this->timestamp = $timestamp;
	    // $this->title = $title;
	    // $this->blogPost = $blogPost;

	    $this->connection = new MongoDB\Client("mongodb://localhost:27017");
    } 

    public function getPosts($userID)
    {
    	// $db = $this->connection->bloog;
     //    $userCollection = $db->users;
    	// $postCollection = $db->posts;

     //    $userQuery = array("username" => "user1");
    	// $query = array("userID" => "5afab29e8739043783b3e293");
     //    $options = ['sort' => ['timestamp' => -1]];

    	// //$userID = $_SESSION["userID"];
     //    $user = $userCollection->find($userQuery);
     //    //$user = $user->toArray();

     //    //echo $user[0]->_id;

    	// $posts = $postCollection->find($query, $options);
    	// //$posts = $posts->toArray();



     //    return $posts;
    }


    public function fetchAllPost($userID)
    {
        //$returnval = 
    }

    public function fetchFollowingPosts()
    {
        $postAndTimestampArray = [];

        foreach($following as $index => $userID)
        {
            $postAndTimestampArray.push(fetchAllPosts().each());    
        }

        foreach($postAndTimestampArray as $postID => $timestamp)
        {
                //print here
        }
    }


    public function createBlogPost($title, $qText)
    {
    	try {

    		$db = $this->connection->bloog;
    		$collection = $db->posts;

    		$postDocument = array("title" => $title, "post" => $qText, "userID"=> $_SESSION['userID'], "timestamp" => new \MongoDB\BSON\UTCDateTime(), "username" => $_SESSION['username']);

    		$collection->insertOne($postDocument);
    		return true;

    	} 
    	catch (MongoConnectionException $e) 
    	{
        	//die('Error connecting to MongoDB server');
        	return false;
    	} 
    	catch (MongoException $e) 
    	{
        	die('Error: ' . $e->getMessage());
        	return false;
    	}


    }

    

    public function updateBlogPost($postID, $title, $post)
    {
        $db = $this->connection->bloog;
        $collection = $db->posts;

        $query = $collection->updateOne(
                [ '_id' => $postID ],
                [ '$set' => [ 'title' => $title, 'post' => $post ]]
        );

        return true;

    }

    public function deleteBlogPost($postID)
    {
        $db = $this->connection->bloog;
        $collection = $db->posts;

        $query = array("postID" => $postID);

        $collection->remove($query);

        return true;
    }
}

?>