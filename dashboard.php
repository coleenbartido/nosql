<?php


	// include_once('controller/dashboardController.php');

	// $dashboardController = new dashboardController();
	// $dashboardController->getBlogPosts();

	session_start();

	if(!isset($_SESSION['userID'])){
        header("location: index.php");
        exit();
    }

?>

<!-- <html>
<head><title>DASHBOARD</title></head>
<body>

</body>
</html> -->

<!DOCTYPE HTML>
<html>
	<head>
		<title>Bloog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="https://i.icomoon.io/public/temp/4045dc6036/UntitledProject/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/user-profile.css">


		<link rel="icon" href="assets/bloog-logo.png" type="image/gif" sizes="16x16">
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href="#">Bloog</a></h1>
						<nav class="links">
							<ul>
								<li><a href="#"><span class="icon-home2"></span>Home</a></li>
								<li><a href="view/createPost.php"><span class="icon-pencil"></span>Write Post</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul>
								<li class="search" style="margin: 0 25px;">
									<a class="fa-search" href="view/search.php?searchTerm='blog'">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="dropdown">
										<a href="profile.php" class="account" >
											<img src="assets/dp.jpg" class="profile-circle"/>
										</a>
								</li>



							</ul>
						</nav>
					</header>

				<!-- Sidebar -->
					<div class="main col-md-12 article-post" >
						<center>

							<?php

							require 'vendor/autoload.php';
							//include('controller/dashboardController.php');
							//include('model/BlogPost.php');

							$connection = new MongoDB\Client("mongodb://localhost:27017");

							//$dboardController = new dashboardController();

							$db = $connection->bloog;
        					$userCollection = $db->users;
        					$postCollection = $db->posts;


        					$userID = $_SESSION['userID'];

        					$userQuery = array("_id" => $userID);
    						$query = array("userID" => $userID);
        					$options = ['sort' => ['timestamp' => -1]];

        					$posts = $postCollection->find($query)->toArray();

        					$user = $userCollection->findOne($userQuery);
        					$following = [];

        					$timeline = [];


        					if(isset($user['following']))
        					{
        						$following = $user['following'];
        						foreach($following as $follow)
        						{
        							$query = array("username" => strval($follow->username));
        							$followingPosts = $postCollection->find($query)->toArray();
        						//$followingPosts = json_encode($followingPosts);
        						//var_dump($followingPosts);

        						// if($followingPosts != NULL)
        						// {
        						// 	foreach($followingPosts as $onePost)
        						// 	{
        						// 		array_push($allPosts, $onePost);
        						// 	}
        						// 	// $tempArray = json_decode($followingPosts, true);
        						// 	// array_push($followingPosts, $posts);

        						// }

        							$timeline = array_merge($timeline, $followingPosts);

        						}
        					}





        					usort($timeline, function($a, $b){

        			 			//if(strtotime($a['timestamp']) == strtotime($b['timestamp'])) return 0;
								// return ($a<$b)? -1:1;
								return strtotime($b['timestamp']) - strtotime($a['timestamp']);
        					});

        					//var_dump($posts);


    						if($timeline == NULL)
    						{
    							echo "NO POSTS YET. You might want to follow some people.";
    						}
    						else
    						{

    							foreach($timeline as $post)
    							{
    					// 			$date = new DateTime($post['timestamp']);
									// $date->setTimezone(new DateTimeZone('Asia')); // +04

									// echo $date->format('Y-m-d H:i:s');


    								$link = "view/viewPost.php?viewPost=". $post['_id'];

    								$editFilename = $userID . $post['time'];

    								echo '<article class="mini-post">';
										echo '<header>';
											echo'<h3><a href="#">' . $post['title'] . '</a></h3>';
										echo '<time style="text-align: left; font-size: 8px; padding-top: 6px;"class="published" 		datetime="2015-10-20">' . $post['timestamp'] . '</time>';
										echo '<p class="text-snippet" style=""> '. $post['post'] . '</p>
											<p class="read-more"><a href="'.$link.'">Read More ›</a></p>';
										echo '</header>';
										echo '<div class="img__wrap">';
											echo '<a href="#" class="image"><img class="img__img" src="https://images.pexels.com/photos/925682	/pexels-photo-925682.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" 	alt="" /></a>';
										echo '<div class="img__description">';
												echo '<a href="#" class="author"><img src="https://images.pexels.com/photos/235444/		pexels-photo-235444.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=350" alt="" /><p>' .$post['name'] . '</p></a>';
											echo '</div>';
										echo '</div>';
									echo '</article>';
								}
    						}

							?>

							<!--a href="#" class="button small">Follow</a-->









						</center>
					</div>
			</div>

			<div class="footer">
				Insert footer here. <strong>bye world</strong>.
			</div>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

			<!-- Bootstrap 4-->
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	</body>
</html>
