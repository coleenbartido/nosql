<?php

	require '../vendor/autoload.php'; //Load the library for Mongodb

	$connection = new MongoDB\Client("mongodb://localhost:27017");
	$db = $connection->bloog;
	$collection = $db->Users;

	$email = $_POST['inputEmail'];

	$password = $_POST['inputPassword'];
	//echo $password;


	$userAccount = $collection->findOne(
    array(
        'Email' => $email,
        'Password' => $password 
      )
    );

 //    $userAccount = $collection->find(
 //    	array(
 //    		'$or' => array(
 //  				array( 
 //  					'$and' => array(
 //        				'Email' => $email,
 //        				'Password' => $password 
 //        			)
 //      			),
 //  				array( 
 //  					'$and' => array(
 //        				'Username' => $email,
 //        				'Password' => $password 
 //        			)
 //      			),
	// 		)
	// 	)
	// );

	//$filter = ['$or' => [['Email' => $email, 'Password'=> $password], ['Username' => $email, 'Password'=> $password]]];

	if($userAccount != NULL)
	{
		var_dump($userAccount);
	}
	else 
	{
		echo "PSIKE";
	}

	


	// if($userAccount != NULL)
	// {
	// 	header("location: ../test.php");
	// } 
	// else
	// {
	// 	header("location: ../testtest.php");
	// }
  

?>