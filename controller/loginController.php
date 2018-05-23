<?php

	include_once("../model/UserAccount.php");
	include_once("../model/BlogPost.php");

	//include_once("../controller/dashboardController.php");
	
	session_start();

	$loginController = new loginController();
	$loginController->verifyUser();

	class loginController{

		public $userModel;
		public $postModel;

		//public $dboardController;
		

		public function __construct()  
    	{	  

        	$this->userModel = new UserAccount();
        	$this->postModel = new BlogPost();

        	//$this->dboardController = new dashboardController();

    	} 

    	public function verifyUser()
    	{
    		$email = $_POST['inputEmail'];
    		$password = $_POST['inputPassword'];

    		$user = $this->userModel->getUser($email, $password);

    		if($user != NULL)
    		{
    			$_SESSION['userID'] = $user->_id;
    			$_SESSION['username'] = $user->username;
					
				//header("Location: dashboardController.php");
				header("Location: ../dashboard.php");
				exit();

    			//include '../view/dashboard.php';

    		} 
    		else
    		{
    			
    			header("Location: ../index.php?msg=invalid");
				exit();
    		}

    		
    	}

   }
	


	// $userAccount = $collection->findOne(
 	//    array(
 	//        'Email' => $email,
 	//        'Password' => $password 
 	//      )
 	//    );

 //    $userAccount = $collection->findOne(
 //    	array(
 //    		'$or' => array(
 //    			0 =>
 //  				array( 'Email' => $email, 'Password' => $password),
 //  				1 =>
 //  				array('Username' => $email, 'Password' => $password),
	// 		)
	// 	)
	// );


	
	// if($userAccount != NULL)
	// {
	// 	header("location: ../dashboard.php");
	// } 
	// else
	// {
	// 	header("location: ../testtest.php");
	// }
  
	// }

	

?>