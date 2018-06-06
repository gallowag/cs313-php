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
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	<title>Korean Dramas</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<h2>Dramas</h2>

	<ul>

	<?php
	foreach ($dramas as $drama) {

		$id = $drama["id"];
		$title = $drama["title"];
		$img = $drama["img"];

		echo "<li><img src='$img' class='img-thumbnail'><a href='dramaDetails.php?drama_id=$id'>  $title</a></li><br>";

	}
	?>

	</ul>

	</div>
</div>
</body>
</html>