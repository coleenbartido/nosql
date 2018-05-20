<?php


	// include_once('controller/dashboardController.php');

	// $dashboardController = new dashboardController();
	// $dashboardController->getBlogPosts();

	session_start();

	if(!isset($_SESSION['userID'])){
        header("location: profile.php");
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
		<link rel="stylesheet" href="assets/css/user-profile.css" />
		<link rel="stylesheet" href="assets/css/main.css" />


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
								<li class="search">
									<a class="fa-search" href="view/search.php?searchTerm='blog'">Search</a>
									<form id="search" method="get" action="#">
										<input type="text" name="query" placeholder="Search" />
									</form>
								</li>
								<li class="dropdown">
										<a href="profile.php" class="account" >
										<img src="images/avatar.jpg" class="profile-circle"/>
										</a>
								</li>



							</ul>
						</nav>
					</header>

				<!-- Sidebar -->
					<div class="main col-md-12 article-post" >
						<div class="user-profile col-md-offset-2 col-md-8">
							<div class="user-icon col-md-3">

							</div>
							<div class="user-buttons col-md-2">

							</div>
							<div class="user-details col-md-6">
								<h1>NAME</h1>
								<a href="#">@Username</a> <br>
								<div class="follower-count col-md-4">
									<h3>FOLLOWERS</h3>
								</div>
								<div class="following-count col-md-4">
									<h3>FOLLOWING</h3>
								</div>
							</div>
						</div>

						<div class="posts-feed">
							<div class="post-temp col-md-offset-2 col-md-8">
								<div class="col-md-2">
									<div class="user-icon-sm ">

									</div>
								</div>
								<div class="details col-md-6">
									<h1>article title</h1>
									<a href="#">date posted</a> <br>
								</div>
								<div class="post-buttons col-md-2">

								</div>
								<div class="post-text col-md-9">
									<p>TEST</p>
								</div>
							</div>
							<div class="post-temp col-md-offset-2 col-md-8">
								<div class="col-md-2">
									<div class="user-icon-sm ">

									</div>
								</div>
								<div class="details col-md-6">
									<h1>article title</h1>
									<a href="#">date posted</a> <br>
								</div>
								<div class="post-buttons col-md-2">

								</div>
								<div class="post-text col-md-9">
									<p>TEST</p>
								</div>
							</div>
							<div class="post-temp col-md-offset-2 col-md-8">
								<div class="col-md-2">
									<div class="user-icon-sm ">

									</div>
								</div>
								<div class="details col-md-6">
									<h1>article title</h1>
									<a href="#">date posted</a> <br>
								</div>
								<div class="post-buttons col-md-2">

								</div>
								<div class="post-text col-md-9">
									<p>TEST</p>
								</div>
							</div>
						</div>
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
