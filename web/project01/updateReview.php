<?php
require("dbConnect.php");
$db = get_db();

$review_id = htmlspecialchars($_POST["review_id"]);
$rating = htmlspecialchars($_POST["rating"]);
$body = htmlspecialchars($_POST["body"]);

if($rating > 10 || $rating < 1) {
	header("Location: userDetails.php");
	die();
} 

$query = "UPDATE review SET date = now(), rating = :rating, body = :body WHERE id = :id";
$statement = $db->prepare($query);
$statement->bindValue(":rating", $rating, PDO::PARAM_STR);
$statement->bindValue(":body", $body, PDO::PARAM_STR);
$statement->bindValue(":id", $review_id, PDO::PARAM_INT);
$statement->execute();

header("Location: userDetails.php");
die();
?>