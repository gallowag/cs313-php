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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
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