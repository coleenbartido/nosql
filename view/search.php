<?php
	session_start();

	if(!isset($_SESSION['userID'])){
        header("location: index.php");
        exit();
    }

	require 'vendor/autoload.php'; 

	$connection = new MongoDB\Client("mongodb://localhost:27017");

							
	$db = $connection->bloog;
    $userCollection = $db->users;
    $postCollection = $db->posts;

    $userID = $_SESSION['userID'];
    $searchQuery = $_GET['searchTerm'];

    $usernameQuery = array("username" => $searchQuery);
    $emailQuery = array("username" => $searchQuery);

    $titleQuery = array("title" => $searchQuery);
    $postQuery = array("title" => $searchQuery);


  //   $users = $userCollection->find(
  //   		array(
  //   			'$or' => array(
  //   					0 =>
  // 						$usernameQuery,
  // 						1 =>
  // 						$emailQuery,
		// 			)
		// 		)
		// )->toArray();

  //   $posts = $postCollection->find(
  //   		array(
  //   			'$or' => array(
  //   					0 =>
  // 						$usernameQuery,
  // 						1 =>
  // 						$emailQuery,
		// 			)
		// 		)
		// )->toArray();
?>