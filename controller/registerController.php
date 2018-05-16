<?php

	include_once("../model/UserAccount.php");
	
	session_start();

	$registerController = new registerController();
	$registerController->registerUser();

	class registerController
	{
		public $userModel;

		public function __construct()  
    	{	  
        	$this->userModel = new UserAccount();

    	} 

    	public function registerUser()
    	{

    		$username = $_POST['inputUsername'];
    		$email = $_POST['inputEmail'];
    		$password = $_POST['inputPassword'];

    		
    		$isValid = $this->userModel->registerUser($username, $email, $password);

    		if($isValid)
    		{
    			include '../index.php';
    		}
    		else
    		{
    			echo "Something went wrong";
    		}
    		

    		

    		//var_dump(json_encode($user));

    // 		if($user != NULL)
    // 		{
    // 			//$_SESSION['user'] = $email;
				// //include '../view/dashboard.php';
				// echo "yes";
    // 		} 
    // 		else
    // 		{
    // 			echo "bitch please";
    // 		}

    		
    	}
	}
?>