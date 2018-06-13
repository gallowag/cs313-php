<?php

$dramaId = htmlspecialchars($_POST["drama_id"]);
$rating = htmlspecialchars($_POST["rating"]);
$body = htmlspecialchars($_POST["body"]);

require("dbConnect.php");
$db = get_db();

session_start();

if(isset($_SESSION['id'])) {
	$id = $_SESSION['id'];
} else {
	header("Location: dramaDetails.php?drama_id=$dramaId");
	die();
}

if($rating > 10 || $rating < 1) {
	header("Location: dramaDetails.php?drama_id=$dramaId");
	die();
} 

$query = "INSERT INTO review (user_id, drama_id, date, rating, body) VALUES (:id, :dramaId, now(), :rating, :body)";
$statement = $db->prepare($query);
$statement->bindValue(":id", $id, PDO::PARAM_INT);
$statement->bindValue(":dramaId", $dramaId, PDO::PARAM_INT);
$statement->bindValue(":rating", $rating, PDO::PARAM_STR);
$statement->bindValue(":body", $body, PDO::PARAM_STR);
$statement->execute();

header("Location: dramaDetails.php?drama_id=$dramaId");
die();
?>