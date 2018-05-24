<?php
	include("../model/UserAccount.php");

	session_start();

	$userController = new userController();


	if(!empty($_GET['functionCall']))
	{
		
		if($_GET['functionCall'] == "follow")
		{
			
			$userController->followUser();
		}
	}


	class userController
	{
		public $userModel;

		public function __construct()
		{
			$this->userModel = new UserAccount();
			
		}

		public function followUser()
		{
			$username = $_GET['username'];
			$userID = $_GET['userId'];
			$search = $_GET['search'];

			$this->userModel->followUser($username, $userID);

			header("Location: ../view/search.php?search=" . $search);
			exit();
		}
	}
?>

