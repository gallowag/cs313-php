<?php

$review_id = htmlspecialchars($_POST["review_id"]);

require("dbConnect.php");
$db = get_db();

session_start();

if(isset($_SESSION['id'])) {
	$user_id = $_SESSION['id'];
} else {
	header("Location: home.php");
	die();
}

$query = "DELETE FROM review WHERE id=:id AND user_id=:user_id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $review_id, PDO::PARAM_INT);
$statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
$statement->execute();

header("Location: userDetails.php");
die();
?>