<?php

//connect to database
require("dbConnect.php");

$db = get_db();
if (!isset($db)) {
	die("DB Connection was not set");
}

$query = "SELECT id, name, img FROM actor";
$statement = $db->prepare($query);

// Bind any variables I need, here...
$statement->execute();
$actors = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	<title>Actors</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<h2>Actors</h2>

	<ul>

	<?php
	foreach ($actors as $actor) {

		$id = $actor["id"];
		$name = $actor["name"];
		$img = $actor["img"];

		echo "<li><img src='$img' class='img-thumbnail'><a href='actorDetails.php?actor_id=$id'><p>$name</p></a></li><br>";
	}
	?>

	</ul>

	</div>
</div>
</body>
</html>