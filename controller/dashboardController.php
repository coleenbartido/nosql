<?php
	
	include_once("../model/BlogPost.php");

	session_start();

	$blogController = new dashboardController();

	if(!empty($_GET['functionCall']))
	{
		switch($_GET['functionCall'])
		{
			case "create": 
				$blogController->createBlogPost(); 
				break;
		
			default: 
				echo "Function call does not exist";
				break;
		}
	}
	else
	{
		$blogController->getPosts();
	}
	
	


	class dashboardController
	{
		public $postModel;

		public function __construct()
		{
			$this->postModel = new BlogPost();
		}

		public function getPosts()
		{
			echo "GET POSTS()";
		}

		public function createBlogPost()
		{
			echo "CREATE BLOG POSTS()";
		}


	}
?>