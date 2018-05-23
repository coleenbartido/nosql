<?php
	
	include("../model/BlogPost.php");

	// if(!isset($_SESSION)) 
 //    { 
 //        session_start(); 
 //    }
 //    else
 //    {
 //        session_destroy();
 //        session_start(); 
 //    }

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

			default: 
				echo "Function call does not exist";
				break;
		}
	} 
	else
	{		if($_GET['functionCall'] == "delete")
			{
				$blogController->deleteBlogPost();
			}
			else
			{
				header("Location: ../dashboard.php");
				exit();
			}
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

			
			$title = $_POST['article-title'];
			$qText = $_POST['quillText'];
			// echo $qText;
			$innerHTML = $_POST['quillInnerHTML'];

			$contents = $_POST['quillContents'];
			//echo $contents;
			
			$this->postModel->createBlogPost($title, $qText, $innerHTML, $contents);

			header('Location: ../dashboard.php');
			exit();
			
		}

		public function updateBlogPost()
		{
			$postID = $_POST['postId'];
			$title = $_POST['article-title'];
			$innerHTML = $_POST['quillInnerHTML'];
			$quillText = $_POST['quillText'];
			$time = $_POST['time'];

			$this->postModel->updateBlogPost($postID, $title, $innerHTML, $quillText, $time);

			header('Location: ../profile.php');
			exit();
		}

		public function deleteBlogPost()
		{
			$postID = $_GET['postID'];
			$time = $_GET['time'];

			$this->postModel->deleteBlogPost($postID, $time);

			header('Location: ../profile.php');
			exit();

		}

		public function search()
		{
			$searchQuery = $_GET['searchTerm'];

			$this->model->search();

			header('Location: ../search.php?searchTerm=' . $searchQuery);
			exit;
		}

		public function logout()
		{
			session_destroy();
			
			header("Location: ../index.php");
			exit();
		}


	}
?>