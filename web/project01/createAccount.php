<?php

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!isset($username) || $username == ""
	|| !isset($password) || $password == ""
	|| !isset($email) || $email == "")
{
	header("Location: signUp.php");
	die();
}

$username = htmlspecialchars($username);

// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Connect to the database
require("dbConnect.php");
$db = get_db();

$query = 'INSERT INTO user(username, email,password) VALUES(:username, :email,:password)';
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':email', $email);
$statement->bindValue(':password', $hashedPassword);

$statement->execute();

header("Location: signIn.php");
die(); 

?>