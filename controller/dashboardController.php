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

			case "delete":
				$blogController->deleteBlogPost();
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
			$postID = $_POST['postID'];
			$title = $_POST['title'];
			$post = $_POST['post'];

			$this->postModel->updateBlogPost($postID, $title, $post);

			header('Location: ../dashboard.php');
			exit();
		}

		public function deleteBlogPost()
		{
			$postID = $_GET['postID'];

			$this->postModel->deleteBlogPost($postID);

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