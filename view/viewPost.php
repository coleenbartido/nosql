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

	    <!--QUILL TEXT EDITOR-->
    	<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
    	<script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>

	    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/a9a70307e1/UntitledProject/style.css">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" href="../assets/css/main.css" />
      <link rel="stylesheet" href="../assets/css/user-profile.css">

			<link rel="icon" href="assets/bloog-logo.png" type="image/gif" sizes="16x16">
	  </head>
	<body>


		<div>
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
              <ul class="">
                <li>
                  <form class="form-search" action="../controller/dashboardController.php" method="POST">
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
                	<form method="POST" action="../controller/dashboardController.php">
                      <input type="hidden" name="functionCall" value="logout">
                      <button class="btn-logout" type="submit">Logout</button>
                  </form>
                </li>
              </ul>
            </nav>
          </header>
	  </div>



	  <div class="container col-md-8">

	    <div class="image-container">
	      <img src="https://images.pexels.com/photos/925682/pexels-photo-925682.png?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
	    </div>

	    <div class="article-panel col-md-11" style="">

	      <div class="about-author col-md-12" style="">
	        <div style="" class="call-div col-md-11">
	          <a href="#" class="author-img" style=""><img src="https://images.pexels.com/photos/324658/pexels-photo-324658.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="" /></a>
	          <div class="name-dateposted" style="">
	            <h6 class="author-name" style=""><?php echo $post['username']?></h6>
	            <p class="date-posted" style=""><?php echo $post['timestamp'] ?> </p>
	          </div>
	        </div>
	        <!-- <div class="follow-btn pull-right">
	          <button class="secondary-btn" type="submit" value="submit">Follow</button>
	        </div> -->

	      <div class="article-title col-md-11" style="">
	        <h1 style=""><?php echo $post['title']?></h1>
	      </div>


	      <!-- <div class="col-md-11 article-content">
	      	<div id="editor" style="border:1px solid red; height: 100px;">
	        	<?php echo file_get_contents($post['file']);?>
	        </div>
	      </div> -->

	       <div class="container col col-md-7 col">
   			
		    	<div id="editor" >
		    		<?php echo file_get_contents($post['file']);?>
		    	</div>
		  </div>

	      <hr style=""/>



	    </div>
	  </div>

	  <div class="comment-section col-md-9" style="">
	    <label for="comment-area" class="article-title" style="">Comment Section</label>

	    <form method="POST" action="../controller/dashboardController.php">
	      <input type="hidden" name="functionCall" value="comment">
	      <input type="hidden" name="postID" value="<?php echo $post['_id']?>" >

	      <textarea class="comment-box" name="comment-area" id="comment" style="" rows="5" cols="10" ;></textarea>
	      <button class="pull-right publish-article" type="submit" value="submit" style="margin-top:2%;">Post Comment</button>
	    </form>
	  </div>

	  <div class="posted-comments" style="">
	    <div>

	      <div class="panel panel-default col-md-9" style="">
	            <div class="panel-body" style="">
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
	                            <img style="margin-top:30%;" src="https://images.pexels.com/photos/1108249/pexels-photo-1108249.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-circle">
	                        </div>
	                        <div class="media-body">
	                            <h4 class="media-heading" style="">
	                                <?php echo $comment['username'] ?>
	                                <br>
	                                <p class="ewan">
	                                    <a href="#"><?php echo $post['title'] ?></a>
	                                </p>
	                            </h4>
	                            <p class="kumento" style="">
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

	  <script>
	  	var toolbarOptions = [
        //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        
		];
  		var quill = new Quill('#editor', {
  			modules: {
    			toolbar: false
  			},
    		theme: 'snow',
    		readOnly: true
  		});
	  </script>

	</body>
	</html>
