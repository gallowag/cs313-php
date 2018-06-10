<?php

	session_start();
	//$_SESSION["loggedIn"] = false;

	echo "in signin";
	// Connect to the DB
	require("dbConnect.php");
	$db = get_db();

	if(isset($_POST["username"]) && isset($_POST["password"])) {

		$username = $_POST["username"];
		$password = $_POST["password"];

		$query = "SELECT id, password FROM user WHERE username=:username";
		$statement = $db->prepare($query);
		$statement->bindValue(':username', $username);
		$result = $statement->execute();

		if($result) {

			$row = $statement->fetch();
			$hashedPasswordFromDB = $row["password"];
			$id = $row["id"];

			// now check to see if the hashed password matches
			if (password_verify($password, $hashedPasswordFromDB))
			{
				// password was correct, put the user on the session, and redirect to home
				$_SESSION['username'] = $username;
				header("Location: home.php");
				die(); // we always include a die after redirects.
			}
			
		}

	}
?>