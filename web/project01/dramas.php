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

	<h2>Dramas</h2><br>

	<ul>

	<?php
	foreach ($dramas as $drama) {

		$id = $drama["id"];
		$title = $drama["title"];
		$img = $drama["img"];

		$query6 = "SELECT round(AVG(rating),1) AS drama_rating FROM review WHERE drama_id=:id";
		$statement6 = $db->prepare($query6);
		$statement6->bindValue(":id", $id, PDO::PARAM_INT);
		$statement6->execute();

		$row6 = $statement6->fetch();

		$drama_rating = $row6["drama_rating"];

		echo "<li><a href='dramaDetails.php?drama_id=$id'><img src='$img' class='img-thumbnail'><p>$title | $drama_rating</p></a></li>";

	}
	?>

	</ul>

	</div>
</div>
</body>
</html>