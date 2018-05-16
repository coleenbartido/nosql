<?php

	//session_start();

class BlogPost {
	public $userID;
	public $author;
	public $timestamp;
	public $title;
	public $blogPost;
	
	public function __construct(/*$userID, $author, $timestamp, $title, $blogPost*/)  
    {  
     //    $this->userID = $userID;
	    // $this->author = $author;
	    // $this->timestamp = $timestamp;
	    // $this->title = $title;
	    // $this->blogPost = $blogPost;
    } 

    public function getBlogPosts()
    {
    	$userID = $_SESSION["userID"];
    }

    public function createBlogPost()
    {

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
}

?>