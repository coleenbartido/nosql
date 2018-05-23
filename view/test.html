<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Write Post | Bloog</title>

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
            <li><a href="#"><span class="icon-pencil"></span>Write Post</a></li>
          </ul>
        </nav>
        <nav class="main">
          <ul>
            <li class="search">
              <a class="fa-search" href="#search">Search</a>
              <form id="search" method="get" action="#">
                <input type="text" name="query" placeholder="Search" />
              </form>
            </li>
            <li class="dropdown">
                <a href=""# class="account" >
                <img src="images/avatar.jpg" class="profile-circle"/>
                </a>
            </li>
          </ul>
        </nav>
      </header>
  </div>



  <div class="container col col-md-7 col">
    <h1 class="write-post">Write Post</h1>
    <!-- <label for="form">Article Text</label> -->
    <form id="form" name="form"  action="../controller/dashboardController.php" method="POST">
  		<label for="article-title" class="article-title">Title</label>
      <input type="text" class="form-control article-input" id="article-title" name="article-title" required="required" placeholder="" value="">

      <input type='hidden' name="functionCall" value="create">

      <!-- // added this block -->
      <input type='hidden' name="quillInnerHTML" id="quillInnerHTML">
      <input type='hidden' name="quillContents" id="quillContents">
      <input type='hidden' name="quillText" id="quillText">
      <input type='hidden' name="postPics" id="postPics" value="" />
      <!-- // end block -->

      <label for="editor" class="article-title">Body</label>
    	<div id="editor" >

    	</div>
    	<button class="publish-article" type="submit" value="submit">Publish Post</button>
    	<!-- <button onclick="logHtmlContent()">Log content as HTML</button> -->
    	<!-- <button onclick=""> -->
      </form>
  </div>

  <!-- <button onclick="logHtmlContent()">Log content as HTML</button> -->





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

      function logHtmlContent() {
        console.log("***innerHTML***")
    		console.log(quill.root.innerHTML);  //save to DB kasi ito yung i-lload sa single page.
        console.log("***getContents***");
    		console.log(quill.getContents())    //save to DB kasi later on ito yung i-s-setContents() pag edit mode na.
        console.log("***setContents***")
    		console.log(quill.getText())
  		}

       var form = document.querySelector('#form');
       form.onsubmit = function()
       {

         var quillInnerHTML = document.getElementById('quillInnerHTML');
         quillInnerHTML.value = quill.root.innerHTML;
         console.log("Quill Value = " + quillInnerHTML.value);

         var qContent = document.querySelector('input[name=quillContents]');
         //qContent.value = quill.getContents();
         content = quill.getContents();
         console.log("Quill Contents = "+ JSON.stringify(content));
         qContent.value = content;

         var qText = document.querySelector('input[name=quillText]');
         qText.value = quill.getText();
         console.log("Quill Text = " + qText.value);


        imageCount = 0;
        imageArray = new Array();
        console.log("Contents Length:" + contents.ops.length);
        for (var i = 0; i < content.ops.length; i++) {
          if(content.ops[i].hasOwnProperty("insert")) {
            if(content.ops[i].insert.hasOwnProperty("image")) {
              console.log(content.ops[i].insert.image);
              imageArray.push(content.ops[i].insert.image)
              imageCount++;
            }
          }
        };

        var postPics = document.querySelector('input[name=postPics]');
        //This means that imageArray has contents
        if(imageArray.length > 0) {
            postPics.value = JSON.stringify(imageArray);
        }


       };

	</script>

  </body>
</html>
