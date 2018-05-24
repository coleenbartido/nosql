<?php
    

    require '../vendor/autoload.php';


    $connection = new MongoDB\Client("mongodb://localhost:27017");

    $db = $connection->bloog;
    $postCollection = $db->posts;

    $postID = $_GET['viewPost'];

    $query = array("_id" => new MongoDB\BSON\ObjectId($postID));
    //$query = array("_id" => $postID);

    $post = $postCollection->findOne($query);

    $comments = [];

    if(isset($post['comments']))
    {
      $comments = $post['comments'];
    }


  ?>



<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>View Post | Bloog</title>

    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/4045dc6036/UntitledProject/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css" />
  </head>
<body>


	<div>
    <!-- Header -->
      <header id="header">
        <h1><a href="#">Bloog</a></h1>
        <nav class="links">
          <ul>
            <li><a href="../dashboard.php"><span class="icon-home2"></span>Home</a></li>
            <li><a href="`../view/createPost.php"><span class="icon-pencil"></span>Write Post</a></li>
          </ul>
        </nav>
        <nav class="main">
          <ul>
            <li class="search">
                <input type="text" name="search" placeholder="Search" />
            </li>
            <li class="dropdown">
                <a href="../profile.php" class="account" >
                <img src="images/avatar.jpg" class="profile-circle"/>
                </a>
            </li>
          </ul>
        </nav>
      </header>
  </div>



  <div class="container col-md-7">

    <div class="image-container">
      <img src="https://images.pexels.com/photos/925682/pexels-photo-925682.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
    </div>
    <div class="article-panel col-md-11">
      <div class="article-title">
        <h1><?php echo $post['title']?></h1>
      </div>
      <div class="about-author">
        <a href="#" class="author-img"><img src="https://images.pexels.com/photos/324658/pexels-photo-324658.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" /></a>
        <div class="name-dateposted">
          <h6 class="author-name"><?php echo $post['username']?></h6>
          <small class="date-posted"><?php echo $post['timestamp'] ?> </small>
        </div>
        <!-- <div class="follow-btn pull-right">
          <button class="secondary-btn" type="submit" value="submit">Follow</button>
        </div> -->
      </div>

      <div class="col-md-11 article-content">
        <p><?php echo file_get_contents($post['file']);?></p>
      </div>

      <hr style="width: 20%; margin-top: 5%!important; margin: 0 auto;"/>

      <div class="comment-section col-md-10" style="margin: 0 auto; margin-top:10%;">
        <label for="comment-area" class="article-title">Comment Section</label>
        
        <form method="POST" action="../controller/dashboardController.php">
          <input type="hidden" name="functionCall" value="comment">
          <input type="hidden" name="postID" value="<?php echo $post['_id']?>" >

          <textarea name="comment-area" id="comment" style="height:200px;" rows="5" cols="10"></textarea>
          <button class="pull-right publish-article" type="submit" value="submit">Post Comment</button>
        </form>
      </div>

      <div class="posted-comments">
        <div>

          <div class="panel panel-default col-md-10" style="margin: 0 auto;">
                <div class="panel-body">
                    <ul class="media-list">


                      <?php 
                        if($comments == NULL)
                        {
                          echo "NO COMMENTS YET";
                        }
                        else
                        {
                          foreach($comments as $comment)
                          {

                      ?>


                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <?php echo $comment['username'] ?>
                                    <br>
                                    <small>
                                        commented on <a href="#"><?php echo $post['title'] ?></a>
                                    </small>
                                </h4>
                                <p>
                                    <?php echo $comment['comment'] ?>
                                </p>
                            </div>
                        </li>

                      <?php
                          }
                        }
                      ?>

<!--                         <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    Aenean Consect
                                    <br>
                                    <small>
                                        commented on <a href="#">Post Title</a>
                                    </small>
                                </h4>
                                <p>
                                    Curabitur vel malesuada tortor, sit amet ultricies mauris. Aenean consectetur ultricies luctus.
                                </p>
                            </div>
                        </li>

                        <li class="media">
                            <div class="media-left">
                               <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    Praesent Tinci
                                    <br>

                                </h4>
                                <p>
                                    Sed convallis dignissim magna et dignissim. Praesent tincidunt sapien eu gravida dignissim.
                                </p>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>

        </div>
      </div>

    </div>
  </div>



</body>
</html>
