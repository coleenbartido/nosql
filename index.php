<?php


?>

<html>
	<head>
		<title>Bloog Login</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body>

	<form action="controller/loginController.php" method="POST">
		<p><input type="email" id="inputEmail" name="inputEmail" required="required" placeholder="Email Address"></input></p>
		<p><input type="text" id="inputPassword" name="inputPassword" required="required" placeholder="Password"> </p>
	

		<p><input type="submit" value="Submit"/>&nbsp;&nbsp;&nbsp;
		   <input type="reset"/>		
	</form>

</body>
</html>
