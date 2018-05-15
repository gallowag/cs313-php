<!DOCTYPE html>
<html>
<head>
	<title>Check Out</title>
	
	  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>
	<div class="container">
	<h3>Check Out</h3>
	<form type="POST" action="confirmation.php">
		<h5>Please enter your shipping information:</h5>
		Address: <input type="text"><br/>
		City: <input type="text"><br/>
		State: <input type="text"><br/>
		Zip: <input type="text"><br/>
		<br/>
		<button type="submit">Check Out</button>
	</form>
	</div>

</body>
</html>