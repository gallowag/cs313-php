<?php
require("dbConnect.php");
$dramaId = htmlspecialchars($_GET["course_id"]);
$db = get_db();
$query = "SELECT name, number FROM drama WHERE id=:id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $courseId, PDO::PARAM_INT);
$statement->execute();
$row = $statement->fetch();
$title = $row["title"];
$img = $row["img"];
$description = $row["description"];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	echo "<img src='$img' class='img-thumbnail'><h2>$title</h2>";
?>

<form action="insertNote.php" method="POST">
<input type="hidden" name="course_id" value="<?php echo $courseId; ?>">
<input type="date" name="date"><br>
<textarea name="content" placeholder="Content"></textarea>

<br><br>
<input type="submit" value="Add Note">
</form>

</body>
</html>