<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>
	<?php

		session_start();

		//get lego item info
		$address = $_POST["address"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];

		echo "<h5>Shipping:</h5><br/>";
		foreach ($_SESSION as $lego => $quantity) {
			echo "" . $quantity . "x " . $lego . "(s)<br/>";
		}

		echo "<h5>To:</h5><br/>";
		echo "" . $address . "<br/>" . $city . ", " . $state . " " . $zip ."";
		
	?>

</body>
</html>