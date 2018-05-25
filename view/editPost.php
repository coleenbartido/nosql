<?php
    session_start();
	  if(!isset($_SESSION['userID'])){
        header("location: index.php");
        exit();
      }
?>

<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Edit Post | Bloog</title>

    <!--QUILL TEXT EDITOR-->
    <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>

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

      <?php

            require '../vendor/autoload.php';

			          $connection = new MongoDB\Client("mongodb://localhost:27017");

			          $db = $connection->bloog;
                $postCollection = $db->posts;

                $userID = $_SESSION['userID'];

                $query = array('userID'=> $userID, 'time'=> (int)$_GET['time']);
                $post = $postCollection->findOne($query);

      ?>

<!--                 // echo "<form class='edit-post' method='POST' action='../controller/dashboardController.php' enctype='multipart/form-data'>";
                // echo "<h1>Edit post</h1>";
                // echo "<hr>";
                // echo "<div class='form-group'>";
                // echo "<input name='postId' type ='hidden' value= " . $post['_id'].">";
                // echo "<input name='about' type='hidden'></div>";

                // echo "<div id='editor'>";
                //     echo file_get_contents($post['filename']);
                // echo "</div>";
                // echo "</div>";
                // echo "<br>";
                // echo "<input class = 'btn btn-lg btn-primary btn-block button' type='submit' name='submit' value='Submit Post!'/>";
                // echo "<a href='../profile.php' class='btn btn-primary'>Go Back to Profile</a>";
                // echo "</form>"; -->



                <!-- echo "<div class='container col col-md-7 col' style='border: 1px solid red;'>";
                    // echo '<label for="article-text">Article Text</label>';
                    echo "<form id='form' name='form' style='width: 100%; background-color: #fefefe; margin: 0 auto;' action='../controller/dashboardController.php' method='POST'>";
                    echo "<label for='article-title'>Article Title</label>";
                    echo "<input type='text' class='form-control' id='article-title' name='article-title' required='required' placeholder='' value=" . $post['title'] .">";

                    echo "<input type='hidden' name='postId' value=" . $post['_id'] . ">";
                    echo "<input type='hidden' name='time' value=" . $_GET['time'] . ">";

                    echo "<input type='hidden' name='functionCall' value='update'>";
                    echo "<input type='hidden' name='quillText'>";
                    echo "<input type='hidden' name='quillInnerHTML'>";

                    echo "<div id='editor'>";
                          echo file_get_contents($post['file']);
                    echo "</div>";

                    echo "<button type='submit' value='submit'>Submit</button>";

                    echo "</form>";
                echo "</div>"; -->



                <div class="container col col-md-7 col">
                  <h1 class="write-post">Edit Post</h1>
                    <!-- <label for="article-text">Article Text</label> -->
                    <form id='form' class='form' name='form' action='../controller/dashboardController.php' method='POST'>
                    <label for='article-title'class="article-title">Title</label>
                    <input type='text' class='form-control article-input' id='article-title' name='article-title' required='required' placeholder='' value= "<?php echo $post['title']  ?>" >

                    <input type='hidden' name='postId' value="<?php echo $post['_id']  ?>" >
                    <input type='hidden' name='time' value="<?php echo $_GET['time'] ?>" >

                    <input type='hidden' name='functionCall' value='update'>
                    <input type='hidden' id='quillText' name='quillText'>
                    <input type='hidden' id='quillInnerHTML' name='quillInnerHTML'>

                    <label for="editor" class="article-title">Body</label>
                    <div id='editor'>
                         <?php echo file_get_contents($post['file']) ?>
                    </div>

                    <button class="publish-article" type="submit" value="submit">Edit Post</button>
                    </form>
                  </div>


  <script>
      var toolbarOptions = [
          //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'font': [] }],
          ['bold', 'italic', 'underline'],          // toggled buttons
          [{ 'color': [] }],                                  // dropdown with defaults from theme
          ['image', 'video'],
          [ 'align', {align:'center'},{align:'right'},{align:'justify' }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          // [{ 'indent': '-1'}, { 'indent': '+1' }],
          // [{ 'header': 1 }, { 'header': 2 }],               // custom button values
          ['blockquote', 'code-block'],
      ];

      var quill = new Quill('#editor', {
        modules: {
          toolbar: toolbarOptions
        },
        theme: 'snow'
      });

      var form = document.querySelector('#form');
      form.onsubmit = function()
      {
         var quillInnerHTML = document.getElementById('quillInnerHTML');
         quillInnerHTML.value = quill.root.innerHTML;

         var qText = document.querySelector('input[name=quillText]');
         qText.value = quill.getText();

      }


  </script>
