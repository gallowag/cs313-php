<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

	<title>Create Account</title>

</head>
<body class="blue-bg">
<div class="container">
	<?php
	require("nav.php");
	?>

	<div class="jumbotron">
	<h2>Create an Account!</h2>
	<form action="createAccount.php" method="post">
		<h4>Username: <input type="text" name="username"><br><br>
		Password: <input type="text" name="password"></h4><br>
		<button type=submit class="btn btn-light">Sign In</button>
	</form>
	<h5>Already have an account? <a href="home.php">Sign In!</a></h5>
	</div>

</div>

</body>
</html>