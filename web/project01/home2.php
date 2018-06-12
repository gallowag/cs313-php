<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	<title>Home</title>

</head>
<body class="blue-bg">
<div class="container">
	<?php
	require("nav.php");
	?>

	<div class="jumbotron">

	<?php

	session_start();
	if (isset($_SESSION["id"])) {
		require("dbConnect.php");
		$db = get_db();

		$user_id = $_SESSION["id"];

		//get user name info
		$query1 = "SELECT username FROM \"user\" WHERE id=:id";
		$statement1 = $db->prepare($query1);
		$statement1->bindValue(":id", $user_id, PDO::PARAM_INT);
		$statement1->execute();

		$row1 = $statement1->fetch();

		$username = $row1["username"];

		echo "<h2>Welcome to K-drama Review, $username!</h2>";
	} else {
		echo "<h2>Welcome to K-drama Review!</h2>";
	}
	
	?>

	</div>

</div>

</body>
</html>