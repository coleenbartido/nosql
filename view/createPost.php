<html>
  <head>
    <link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet"> 
    <script src="https://cdn.quilljs.com/1.3.4/quill.js"></script>
  </head>
  <body>

  	<form action="../controller/dashboardController.php" method="POST">
  		<input type='hidden' name="functionCall" value="create" />  
  	
    	<div id="editor">

    	</div>
    	<button type="submit" value="submit">Submit</button>
    	<button onclick="logHtmlContent()">Log content as HTML</button>
    	<!-- <button onclick=""> -->
    	


    </form>

   <script>
   		var toolbarOptions = [
  			['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  			['blockquote', 'code-block'],

  			[{ 'header': 1 }, { 'header': 2 }],               // custom button values
  			[{ 'list': 'ordered'}, { 'list': 'bullet' }],
  			[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  			[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  			[{ 'direction': 'rtl' }],                         // text direction

  			[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  			[{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  			[{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  			[{ 'font': [] }],
  			[{ 'align': [] }],

  			['clean']                                         // remove formatting button
		];

  		var quill = new Quill('#editor', {

  			modules: {
    			toolbar: toolbarOptions
  			},
    		theme: 'snow'
  		});

  		function logHtmlContent() {
    		console.log(quill.root.innerHTML);
    		console.log(quill.getContents())
  		}
	</script>
  </body>
</html>