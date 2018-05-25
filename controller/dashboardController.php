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

			case "comment":
				$blogController->addComment();
				break;

			case "search":
				$blogController->search();
				break;

			case "logout":
				$blogController->logout();
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

		public function addComment()
		{

			$userID = $_SESSION['userID'];
			$username = $_SESSION['username'];

			$comment = $_POST['comment-area'];
			$postID = $_POST['postID'];

			echo $comment;

			$this->postModel->addComment($userID, $username, $postID, $comment);

			header("Location: ../view/viewPost.php?viewPost=" . $postID);
			exit();
		}

		public function search()
		{
			$search = $_POST['search'];

			// $this->model->search();

			header('Location: ../view/search.php?search=' . $search);
			exit;
		}


		public function logout()
		{
			
			unset($_SESSION['userID']);
			unset($_SESSION['username']);
			session_destroy();
			
			header("Location: ../index.php");
			exit();
		}


	}
?>