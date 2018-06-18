<!DOCTYPE html>
<html>
<head>
	<title>Check Out</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

</head>
<body class="space-bg">
	<div class="container">
	<h3>Check Out</h3>
	<form type="POST" action="confirmation.php">
		<div class="form-group">
		<h5>Please enter your shipping information:</h5>
		<input type="text" name="address" placeholder="Street"><br/>
		<input type="city" name="city" placeholder="City"><br/>
		<input type="state" name="state" placeholder="State"><br/>
		<input type="zip" name="zip" placeholder="Zip"><br/>
		<br/>
		<button type="submit" class="btn btn-primary">Check Out</button>
		</div>
	</form>
	</div>

</body>
</html>