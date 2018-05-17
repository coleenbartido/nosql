<?php
	
	include("../model/BlogPost.php");

	session_start();


	$blogController = new dashboardController();

	if(!empty($_POST['functionCall']))
	{
		switch($_POST['functionCall'])
		{
			case "create": 
				$blogController->createBlogPost(); 
				break;
		
			case "update":
				$blogController->updateBlogPost();
				break;

			case "delete":
				$blogController->deleteBlogPost();
				break;

			default: 
				echo "Function call does not exist";
				break;
		}
	} 
	else
	{
		header("Location: ../dashboard.php");
		exit();
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

		}

		public function createBlogPost()
		{
			$this->postModel->createBlogPost();

			header('Location: ../dashboard.php');
			exit();
			
		}

		public function updateBlogPost()
		{
			$postID = $_POST['postID'];
			$title = $_POST['title'];
			$post = $_POST['post'];

			$this->model->updateBlogPost($postID, $title, $post);

			header('Location: ../dashboard.php');
			exit();
		}

		public function deleteBlogPost()
		{
			$postID = $_POST['postID'];

			$this->model->deleteBlogPost($postID);

			header('Location: ../dashboard.php');
			exit();

		}

		public function logout()
		{
			session_destroy();
			
			header("Location: ../index.php");
			exit();
		}


	}
?>