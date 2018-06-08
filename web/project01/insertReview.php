<?php

$dramaId = htmlspecialchars($_POST["drama_id"]);
$rating = htmlspecialchars($_POST["rating"]);
$body = htmlspecialchars($_POST["body"]);

// echo "Course: $courseId\n";
// echo "date: $date\n";
// echo "content: $content\n";

require("dbConnect.php");
$db = get_db();

$query = "INSERT INTO review (user_id, drama_id, date, rating, body) VALUES (1, :dramaId, now(), :rating, :body)";
$statement = $db->prepare($query);
$statement->bindValue(":dramaId", $dramaId, PDO::PARAM_INT);
$statement->bindValue(":rating", $rating, PDO::PARAM_STR);
$statement->bindValue(":body", $body, PDO::PARAM_STR);
$statement->execute();

header("Location: dramaDetails.php?drama_id=$dramaId");
die();
?>