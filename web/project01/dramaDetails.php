<?php
require("dbConnect.php");

$dramaId = htmlspecialchars($_GET["drama_id"]);
$db = get_db();

//get drama info
$query1 = "SELECT title, img, description, date_started, date_finished FROM drama WHERE id=:id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $dramaId, PDO::PARAM_INT);
$statement1->execute();

$row1 = $statement1->fetch();

$title = $row1["title"];
$img = $row1["img"];
$description = $row1["description"];
$start = $row1["date_started"];
$end = $row1["date_finished"];

//get review info
$query2 = "SELECT user_id, age(date) AS time_stamp, rating, body FROM review WHERE drama_id=:id ORDER BY time_stamp";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $dramaId, PDO::PARAM_INT);

$statement2->execute();
$reviews = $statement2->fetchAll(PDO::FETCH_ASSOC);

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

	<title>Drama Details</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<?php
		echo "<img src='$img' class='img-thumbnail'><h2>$title</h2><br><p>$description</p><br><h4>Aired from $start to $end</h4>";
	?>
	</div>

	<div class="jumbotron">
	<form action="insertComment.php" method="POST">
	<h5>Add a Review</h5>
	<input type="hidden" name="drama_id" value="<?php echo $dramaId; ?>">
	<input name="subject" placeholder="Subject"><br>
	<input name="rating" placeholder="Rating (1-10)"><br>
	<textarea name="body" placeholder="Content"></textarea>

	<br><br>
	<input type="submit" value="Add Review">
	</form>

	<br><br>
	<h3>Reviews</h3>
	<br>

	<ul><hr>
	<?php
	foreach ($reviews as $review) {

		$user_id = $review["user_id"];

		$query3 = "SELECT username FROM \"user\" WHERE id=:user_id";
		$statement3 = $db->prepare($query3);
		$statement3->bindValue(":user_id", $user_id, PDO::PARAM_INT);
		$statement3->execute();

		$row3 = $statement3->fetch();

		$username = $row3["username"];


		$time_stamp = $review["time_stamp"];
		if ($time_stamp == "00:00:00") {
			echo "<li><h6>$username | today</h6>";
		} else {
			echo "<li><h6>$username | $time_stamp ago</h6>";
		}

		$rating = $review["rating"];
		$body = $review["body"];

		echo "<h3>$rating</h3><h5>$body</h5></li><br><hr>";

	}
	?>
	</ul>

	</div>

</div>
</body>
</html>