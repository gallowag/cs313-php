<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>
	<div class="container">
	<h3>Shopping Cart</h3>
	<?php
	session_start();

	foreach ($_SESSION as $lego => $quantity) {
		echo "" . $quantity . "x " . $lego . "(s).";
		echo "<form method=\"post\" action=\"remove.php\">";
		echo "<input type=\"hidden\" name=\"lego\" value=\"$lego\">";
		echo "<button type=\"submit\">Remove from Cart</button></form>";
	}
	?>

	<br/>
	<button><a href="browse.html">Continue Shopping</a></button>
	<button><a href="checkout.php">Check Out</a></button>
	</div>

</body>
</html>