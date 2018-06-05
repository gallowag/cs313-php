<?php
require("dbConnect.php");

$dramaId = htmlspecialchars($_GET["drama_id"]);
$db = get_db();

$query = "SELECT title, img, description FROM drama WHERE id=:id";
$statement = $db->prepare($query);
$statement->bindValue(":id", $dramaId, PDO::PARAM_INT);
$statement->execute();

$row = $statement->fetch();

$title = $row["title"];
$img = $row["img"];
$description = $row["description"];

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

	<title>Drama Details</title>
</head>
<body class="blue-bg">
<div class="container">

	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<?php
		echo "<img src='$img' class='img-thumbnail'><h3>$title</h3><br><p>$description</p>";
	?>

	<form action="insertComment.php" method="POST">
	<input type="hidden" name="drama_id" value="<?php echo $dramaId; ?>">
	<input type="date" name="date"><br>
	<textarea name="content" placeholder="Content"></textarea>

	<br><br>
	<input type="submit" value="Add Review">
	</form>
	</div>

</div>
</body>
</html>