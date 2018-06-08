<?php
require("dbConnect.php");

$actor_id = htmlspecialchars($_GET["actor_id"]);
$db = get_db();

//get actor info
$query1 = "SELECT name, img, birthday, EXTRACT(year FROM age(birthday)) AS age, description FROM actor WHERE id=:id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $actor_id, PDO::PARAM_INT);
$statement1->execute();

$row1 = $statement1->fetch();

$name = $row1["name"];
$img = $row1["img"];
$birthday = $row1["birthday"];
$age = $row1["age"];
$description = $row1["description"];


//get dramas info
$query2 = "SELECT drama_id FROM actors_in_dramas WHERE actor_id=:id";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $actor_id, PDO::PARAM_INT);

$statement2->execute();
$dramas = $statement2->fetchAll(PDO::FETCH_ASSOC);
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

	<title>Actor Details</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<?php
		echo "<img src='$img' class='img-thumbnail'><h2>$name</h2><h4>$birthday ($age)</h4><br><p>$description</p><br>";

		echo "<h3>Works</h3>";

		echo "<ul>";
		foreach ($dramas as $drama) {

			$drama_id = $drama["drama_id"];

			$query3 = "SELECT title, img FROM drama WHERE id=:id";
			$statement3 = $db->prepare($query3);
			$statement3->bindValue(":id", $drama_id, PDO::PARAM_INT);
			$statement3->execute();

			$row3 = $statement3->fetch();

			$title = $row3["title"];
			$drama_img = $row3["img"];

			echo "<li><img src='$drama_img' class='img-thumbnail'><a href='dramaDetails.php?drama_id=$drama_id'><p>$title</p></a></li>";
		}
		echo "</ul>";
	?>

	</div>
</div>
</body>
</html>