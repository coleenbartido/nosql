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


    public function createBlogPost($title, $qText, $innerHTML, $contents)
    {
    	try {

    		$db = $this->connection->bloog;
    		$collection = $db->posts;

            $time = time();
            $timestamp = gmdate("Y-m-d\TH:i:s\Z");
            
            $filename = "../files/" . $_SESSION['userID'] . $time .".html";

            $file = fopen($filename, "w+") or die("Unable to open file!");
            $txt = $innerHTML;
            fwrite($file, $txt);
            fclose($file);

    		$postDocument = array("title" => $title, "post" => $qText, "userID"=> $_SESSION['userID'], 
                "timestamp" => $timestamp, "time"=> $time, "username" => $_SESSION['username'], "comments" => array(), "file"=> $filename);

    		$result = $collection->insertOne($postDocument);
            
           


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

    

    public function updateBlogPost($postID, $title, $innerHTML, $quillText, $time)
    {
        $db = $this->connection->bloog;
        $collection = $db->posts;

        // $query = $collection->updateOne(
        //         [ '_id' => $postID ],
        //         [ '$set' => [ 'title' => $title, 'post' => $quillText]]
        // );
		
        $query = $collection->updateOne(
            array('_id' => new MongoDB\BSON\ObjectId($postID)), 
            array('$set' => array('title' => $title, 'post' => $quillText))
        );  

        $filename = "../files/" . $_SESSION['userID'] . $time . ".html";

        $file = fopen($filename, "w") or die("Unable to open file!");
        $txt = $innerHTML;
        fwrite($file, $txt);
        fclose($file);


        return true;

    }

    public function deleteBlogPost($postID, $time)
    {
        $db = $this->connection->bloog;
        $collection = $db->posts;

        $filename = "../files/" . $_SESSION['userID'] . $time .".html";
        
        $query = array("_id" => new MongoDB\BSON\ObjectId($postID));

        $collection->deleteOne($query);

        unlink($filename);

        return true;
    }

    public function addComment($userID, $username, $postID, $comment)
    {
        $db = $this->connection->bloog;
        $collection = $db->posts;

        $timestamp = gmdate("Y-m-d\TH:i:s\Z");

        $checkPost = array("_id" => new MongoDB\BSON\ObjectId($postID));
        $commentUpdate = array('$push' => array('comments' => array( "username" => $username, "comment"=> $comment, "timestamp" => $timestamp )));

        $collection->updateOne($checkPost, $commentUpdate);
    }
}

?>