<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body class="space-bg">
	<div class="container">
	<h1>Star Wars Lego</h1>

	<div class="jumbotron">

	<h3>Shopping Cart</h3>
	<?php
	session_start();

	foreach ($_SESSION as $lego => $quantity) {
		echo "" . $quantity . "x " . $lego . "(s).";
		echo "<form method=\"post\" action=\"remove.php\">";
		echo "<input type=\"hidden\" name=\"lego\" value=\"$lego\">";
		echo "<button type=\"submit\" class=\"btn btn-danger\">Remove from Cart</button></form>";
	}
	?>

	<br/>
	<form action="browse.html"><button type="submit" class="btn btn-primary">Continue Shopping</button></form><br>
	<form action="checkout.php"><button type="submit" class="btn btn-primary">Go to check out</button></form>
	</div>
	</div>

</body>
</html>