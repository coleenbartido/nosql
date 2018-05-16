<?php

	
	include_once("../model/UserAccount.php");
	
	session_start();

	$loginController = new loginController();
	$loginController->verifyUser();

	class loginController{
		
		public $userModel;

		public function __construct()  
    	{	  
        	$this->userModel = new UserAccount();

    	} 

    	public function verifyUser()
    	{
    		$email = $_POST['inputEmail'];
    		$password = $_POST['inputPassword'];

    		$user = $this->userModel->getUser($email, $password);

    		var_dump(json_encode($user));

    		if($user != NULL)
    		{
    			//$_SESSION['user'] = $email;
				//include '../view/dashboard.php';
				echo "yes HERE I AM IN VERIFY USER";
    		} 
    		else
    		{
    			echo "please HERE I AM IN VERIFY USER";
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