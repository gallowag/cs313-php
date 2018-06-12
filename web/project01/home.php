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
	<h2>Welcome to K-drama Review!</h2>

	<h4>Sign In</h4><br>

	<?php 
		/*session_start();
		if(isset($_SESSION["user_pass_bad"]) && $_SESSION["user_pass_bad"] == true) {
			echo "<div class=\"alert alert-danger\" role=\"alert\">Wrong username or password</div";
		}*/
	?>

	<form action="signIn.php" method="post">
		<div class="form-group">
		<label for="username">Username</label><br>
		<input type="text" name="username" id="username">
		</div>

		<div class="form-group">
		<label for="password">Password</label><br>
		<input type="password" name="password" id="password">
		</div>
		
		<button type=submit class="btn btn-light">Sign In</button>
	</form>

	<h5>Don't have an account? <a href="signUp.php">Create one!</a></h5>
	</div>

</div>

</body>
</html>