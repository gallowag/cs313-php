<?php
require("dbConnect.php");
$db = get_db();
	
$review_id = htmlspecialchars($_POST["review_id"]);

//get review info
$query1 = "SELECT rating, body FROM review WHERE id=:id";
$statement1 = $db->prepare($query1);
$statement1->bindValue(":id", $review_id, PDO::PARAM_INT);
$statement1->execute();

$row1 = $statement1->fetch();

$rating = $row1["rating"];
$body = $row1["body"];

?>
<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	<title>Edit review</title>

</head>
<body class="blue-bg">
<div class="container">
	<?php
	require("nav.php");
	?>

	<div class="jumbotron">
	<h3>Edit review</h3><br>

	<form action="updateReview.php" method="post">
		<input type="hidden" name="review_id" value="<?php echo $review_id; ?>">

		<div class="form-group">
		<label for="rating">Rating</label><br>
		<input name="rating" value="<?php echo $rating; ?>" type="number" id="rating" placeholder="Rating (1-10)"><br>
		</div>

		<div class="form-group">
		<label for="body">Content</label><br>
		<textarea name="body" id="body" placeholder="Content"><?php echo $body; ?></textarea>
		</div>
		
		<button type=submit class="btn btn-light">Save Changes</button>
	</form>
	</div>

</div>

</body>
</html>