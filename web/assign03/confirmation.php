<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body class="space-bg">
	<div class="container">
	<h1>Star Wars Lego</h1>
		
	<div class="jumbotron">

	<?php

		session_start();

		//get lego item info
		$address = htmlspecialchars($_POST["street"]);
		$city = htmlspecialchars($_POST["city"]);
		$state = htmlspecialchars($_POST["state"]);
		$zip = htmlspecialchars($_POST["zip"]);

		echo "<h5>Shipping:</h5><br/>";
		foreach ($_SESSION as $lego => $quantity) {
			echo "" . $quantity . "x " . $lego . "(s)<br/>";
		}

		echo "<h5>To:</h5><br/>";
		echo "$address<br/>$city, $state $zip";
		
	?>
	</div>
	</div>

</body>
</html>