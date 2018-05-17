<html>
<head><title>Bloog</title></head>
<body>


	<?php
		$postID = $_GET['viewPost'];

		require '../vendor/autoload.php'; 


		$connection = new MongoDB\Client("mongodb://localhost:27017");

		$db = $connection->bloog;
        $postCollection = $db->posts;

        $query = array("_id" => new MongoDB\BSON\ObjectId($postID));

        $post = $postCollection->findOne($query);

	?>

</body>
</html>