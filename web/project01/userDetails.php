<?php
require("dbConnect.php");
$db = get_db();

session_start();
$id = $_SESSION['id'];

//get user info
$query1 = "SELECT username, email FROM \"user\" WHERE id=:id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $id, PDO::PARAM_INT);
$statement1->execute();

$row1 = $statement1->fetch();

$username = $row1["username"];
$email = $row1["email"];

//get review info
$query2 = "SELECT r.id, age(r.date) AS time_stamp, r.rating, r.body, d.title FROM review AS r, drama AS d WHERE r.drama_id=d.id AND r.user_id=:id ORDER BY time_stamp";
$statement2 = $db->prepare($query2);
$statement2->bindValue(":id", $id, PDO::PARAM_INT);

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

	<title>Actor Details</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<?php
		echo "<h2>$username<br>$email</h2><br>";
	?>

	<form action="signOut.php">
	<button type="submit" class="btn btn-light">Sign Out</button>
	</form>

	<br><br>
	<h3>Reviews</h3>
	<br>

	<ul><hr>
	<?php
	foreach ($reviews as $review) {

		$title = $review["title"];
		$time_stamp = $review["time_stamp"];

		if ($time_stamp == "00:00:00") {
			echo "<li><h6>$title | today</h6>";
		} else {
			echo "<li><h6>$title | $time_stamp ago</h6>";
		}

		$review_id = $review["id"];
		$rating = $review["rating"];
		$body = $review["body"];

		echo "<h3>$rating</h3><h5>$body</h5></li>";
		echo "<form action=\"editReview.php\" method=\"post\"><input type=\"hidden\" name=\"review_id\" value=\"$review_id\"><button type=\"submit\" class=\"btn btn-success\">Edit</button></form>";
		echo "<form action=\"deleteReview.php\" method=\"post\"><input type=\"hidden\" name=\"review_id\" value=\"$review_id\"><button type=\"submit\" class=\"btn btn-danger\">Delete</button></form>";
		echo "<br><hr>";

	}
	?>
	</ul>
	

	</div>
</div>
</body>
</html>