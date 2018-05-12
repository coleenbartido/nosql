<?php


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!---->
    <link rel="icon" href="assets/bloog-logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="assets/css/login.css"/>

		<title>Bloog Login</title>
	</head>


<body>
	<div class="container col-12">
		<div class="row">

			<div class="left col-5">
				<!---CAROUSEL-->
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block" src="assets/bloog-post.png">
							<div class="carousel-caption d-none d-md-block">
							 <!--p class="post">Follow your interests</p-->
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block" src="assets/bloog-connect.png">
							<div class="carousel-caption d-none d-md-block">
							 <!--p class="connect">Connect with other people</p-->
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block " src="assets/bloog-share-ideas.png">
							<div class="carousel-caption d-none d-md-block">
							 <!--p class="share">Share your ideas</p-->
							</div>
						</div>
					</div>
				</div>
				<!---END OF CAROUSEL--->
			</div>


			<div class="right col-7">
				<div class="title">
					<h1 class="bloog-title">Bloog</h1>
				</div>

				<form class="login" action="controller/loginController.php" method="POST">
					<div class="form-group">
						<label for="inputEmail">Email</label>
						<input type="email" class="form-control" id="inputEmail" name="inputEmail" required="required" placeholder="Email Address">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="inputPassword" name="inputPassword" required="required" placeholder="Password">
						<a class="forgot-pass" href="#">Forgot Password?</a>
					</div>

					<!--div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Check me out</label>
					</div-->
					<button type="submit" class="btn btn-primary" value="Submit">Login</button>
					<button type="submit" class="btn btn-secondary">Register</button>
				</form>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
