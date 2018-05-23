<?php

	include_once("../model/UserAccount.php");
	
	//session_start();

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
            $name = $_POST['inputName'];
    		$email = $_POST['inputEmail'];
    		$password = $_POST['inputPassword'];

    		
    		$isValid = $this->userModel->registerUser($username, $email, $password, $name);

    		if($isValid)
    		{
    			header('Location: ../index.php?msg=success');
                exit();
    		}
    		else
    		{
                header('Location: ../view/register.php?msg=invalid');
                exit();
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