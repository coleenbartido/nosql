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
            <li><a href="#"><span class="icon-home2"></span>Home</a></li>
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



  <div class="container col col-md-7 col" style="border: 1px solid red;">

    <label for="article-text">Article Text</label>
    <form id="form" name="form" style="width: 100%; background-color: #fefefe; margin: 0 auto;"  action="../controller/dashboardController.php" method="POST">
  		<label for="article-title">Article Title</label>
      <input type="text" class="form-control" id="article-title" name="article-title" required="required" placeholder="">

      <input type='hidden' name="functionCall" value="create" />

      <!-- // added this block -->
      <input type='hidden' name="quillInnerHTML" id="quillInnerHTML" value="" />
      <input type='hidden' name="quillContents" id="quillContents" value="" />
      <input type='hidden' name="quillText" id="quillText" value="" />
      <!-- // end block -->

    	<div id="editor">

    	</div>
    	<button type="submit" value="submit">Submit</button>
    	<!-- <button onclick="logHtmlContent()">Log content as HTML</button> -->
    	<!-- <button onclick=""> -->
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
        [{ 'indent': '-1'}, { 'indent': '+1' }],
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

       var form = document.querySelector('form');
       form.onsubmit = function()
       {
         var quillInnerHTML = document.querySelector('inputname=quillInnerHTML]');
         quill.value = quill.root.innerHTML;

         var qContent = document.querySelector('inputname=qContent]');
         qContent.value = JSON.stringify(quill.getContents());

         var qText = document.querySelector('input[name=quillText]');
         qText.value = quill.getText();

       };

	</script>

  </body>
</html>
