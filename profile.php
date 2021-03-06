<?php

	session_start();

	if(!isset($_SESSION['userID'])){
        header("location: profile.php");
        exit();
    }


?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Bloog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="https://i.icomoon.io/public/temp/4045dc6036/UntitledProject/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
								<li><a href="dashboard.php"><span class="icon-home2"></span>Home</a></li>
								<li><a href="view/createPost.php"><span class="icon-pencil"></span>Write Post</a></li>
							</ul>
						</nav>
						<nav class="main">
							<ul class="">
								<li>
									<form class="form-search" action="controller/dashboardController.php" method="POST">
											<div class="input-append">
													<input type="hidden" name="functionCall" value="search">
													<input type="text" name="search" class="span2" placeholder="Search...">
													<button type="submit" class="">Search</button>

											</div>
									</form>
								</li>
								<li class="">
									<a href="profile.php" class="account">
										<img src="assets/dp.jpg" class="profile-circle"/>
									</a>
		            </li>
								<li>
									<form method="POST" action="controller/dashboardController.php">
										<input type="hidden" name="functionCall" value="logout">
										<button class="btn-logout" type="submit">Logout</button>
									</form>
								</li>
		          </ul>
						</nav>
					</header>

				<?php

					require 'vendor/autoload.php';

					$connection = new MongoDB\Client("mongodb://localhost:27017");

					$db = $connection->bloog;
        			$userCollection = $db->users;
        			$postCollection = $db->posts;

        			$userID = $_SESSION['userID'];
        			$username = $_SESSION['username'];

        			$userQuery = array("_id" => $userID);
        			$user = $userCollection->findOne($userQuery);

        			if(isset($user['following']))
        			{
        				$following = $user['following'];
        			}
        			else
        			{
        				$following = 0;
        			}

        			if(isset($user['followers']))
        			{
        				$followers = $user['followers'];
        			}
        			else
        			{
        				$followers = 0;
        			}

        			$postQuery = array("username" => strval($username));
        			$options = ['sort' => ['timestamp' => -1]];
        			$posts = $postCollection->find($postQuery, $options)->toArray();
							$editprofile = 0;

					echo '<div class="main col-md-12 article-post" >';
						echo '<div class="col-md-12">';
							echo '<center><h1 style="color: #2EAABE">PROFILE</h1></center>';
						echo '</div>';
						echo '<div class="user-profile col-md-offset-2 col-md-8">';
							echo '<div class="user-icon col-md-3">';
								echo '<img src="assets/dp.jpg">';
							echo '</div>';
							echo '<div class="user-details col-md-6">';
								echo '<h1>' . $user['name'] .'</h1>';
								echo '<a href="#">@'. $username .'</a> <br>';
								echo '<div class="follower-count col-md-4">';
									echo '<h3 class="h3count">'. count($followers) .'</h3>';
									echo '<h3 class="h3label">FOLLOWERS</h3>';
								echo '</div>';
								echo '<div class="following-count col-md-4">';
									echo '<h3 class="h3count">'. count($following) .'</h3>';
									echo '<h3 class="h3label">FOLLOWING</h3>';
								echo '</div>';
							echo '</div>';
						echo '</div>';

						echo '<div class="posts-feed" style="text-align: center;">';
							if($posts == NULL)
    						{
    							echo "NO POSTS YET.";
    						}
    						else
    						{


    							foreach($posts as $post)
    							{
    								$edit = "view/editPost.php?postID=" . $post['_id'] . "&time=" . $post['time'];
    								$delete = "controller/dashboardController.php?functionCall=delete&postID=" . $post['_id'] . "&time=" . $post['time'];
    								$view = "view/viewPost.php?viewPost=". $post['_id'];

    								echo '<div class="post-temp col-md-offset-2 col-md-8">';
											echo '<div class="icon-holder col-md-2">';
												echo '<img src="assets/dp.jpg">';
											echo '</div>';
											echo '<div class="details col-md-6">';
												echo '<h1><a href=' . $view .'>' . $post['title'].'</a></h1>';
												echo '<h6>' . $post['timestamp'].'</h6> <br>';
											echo '</div>';
											echo '<div class="post-buttons col-md-2">';
											echo '<a href= '. $edit .' ><i class="fa fa-pencil" aria-hidden="true"></i></a>';
											echo '<a href= '. $delete .' ><i class="fa fa-trash" aria-hidden="true"></i></a>';
											echo '</div>';
											echo '<div class="post-text col-md-9">';
												echo '<p>' . $post['post'] .'</p>';
											echo '</div>';
										echo '</div>';
    							}

    						}


						echo '</div>';

					?>

					</div>
			</div>



			<div class="footer">
				Insert footer here. <strong>bye world</strong>.
			</div>


		<!-- Scripts -->

			<script type="text/javascript">
			</script>
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
