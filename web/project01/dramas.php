<?php

//connect to database
require("dbConnect.php");

$db = get_db();
if (!isset($db)) {
	die("DB Connection was not set");
}

$query = "SELECT id, title, img FROM drama";
$statement = $db->prepare($query);

// Bind any variables I need, here...
$statement->execute();
$dramas = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Korean Dramas</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<h2>Dramas</h2>

	<ul>

	<?php
	foreach ($dramas as $drama) {

		$id = $course["id"];
		$title = $course["title"];
		$img = $course["img"];

		echo "<li><img src='$img' class='img-thumbnail'><a href='dramaDetails.php?drama_id=$id'>$title</a></li>";
	}
	?>

	</ul>
	</div>

</body>
</html>