<?php
	session_start();

	if(!isset($_SESSION['userID'])){
        header("location: index.php");
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
    <link rel="stylesheet" href="../assets/css/user-profile.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />

    <link rel="icon" href="../assets/bloog-logo.png" type="image/gif" sizes="16x16">

  </head>
  <body>

      <div id="wrapper">

        <!-- Header -->
          <header id="header">
            <h1><a href="#">Bloog</a></h1>
            <nav class="links">
              <ul>
                <li><a href="../dashboard.php"><span class="icon-home2"></span>Home</a></li>
                <li><a href="createPost.php"><span class="icon-pencil"></span>Write Post</a></li>
              </ul>
            </nav>
            <nav class="main">
              <ul>
                <li class="search">
                  <a class="fa-search" href="search.php?searchTerm='blog'">Search</a>
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
          
              <h1>SEARCH</h1>


          <?php
              require '../vendor/autoload.php'; 

                $connection = new MongoDB\Client("mongodb://localhost:27017");
              
                $db = $connection->bloog;
                  $userCollection = $db->users;

                  //get ID of currently logged in user
                  $userID = $_SESSION['userID'];
                  $username = $_SESSION['username'];

                  //get logged in user's details
                  $userQuery = array("_id" => $userID);
                  $user = $userCollection->findOne($userQuery);
          
                  //get user FOLLOWING for FOLLOW BUTTON
                  $following = [];
          
                  if(isset($user['following']))
                  {
                      $following = $user['following'];
                  }

                  //get search term from URL
                  $searchQuery = $_GET['search'];

                  //create index for full text searching
                  $query = array("email" => "text", "username" => "text");
                  $userCollection->createIndex($query);

                  //full text searching query
                  $findQuery = array('$text' => array( '$search'=> $searchQuery));

                  //full text searching
                  $searchResults = $userCollection->find($findQuery)->toArray();


                  if($searchResults == NULL)
                  {
                      echo "NO RESULTS FOUND";
                  }
                  else
                  {

                      //loop through results
                      foreach($searchResults as $user)
                      {
                  
          ?>

                          <div class="main col-md-12 article-post" >
                              <div class="user-profile col-md-offset-2 col-md-8">
                                <div class="user-icon col-md-3">
                                </div>
                                
                                <div class="user-buttons col-md-2">
                                    <?php 
                                      if($user['username'] == $username)
                                      {
                                        echo "IT ME";
                                      }
                                      else
                                      {
                                        if(in_array($post['username'], $following))
                                        {
                                            echo "UNFOLLOW";
                                        }
                                        else
                                        {
                                          echo "FOLLOW BUTTON";
                                        }

                                      }
                                    ?>
                                </div>
                                
                                <div class="user-details col-md-6">
                                    <h1> <?php echo $user['name'] ?> </h1>
                                    <a href="#"> <?php echo $user['username'] ?> </a> <br>
                    
                                    <div class="follower-count col-md-4">
                                        <h3><?php echo count($user['followers'])?></h3>
                                        <h3>FOLLOWERS</h3>
                                    </div>
                                    <div class="following-count col-md-4">
                                        <h3><?php echo count($user['following'])?></h3>
                                        <h3>FOLLOWING</h3>
                                    </div>
                                </div>
                              </div>
                            </div>

          <?php    }  } ?>

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