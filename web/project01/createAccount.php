<?php

// Connect to the database
require("dbConnect.php");
$db = get_db();

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

session_start();

$query1 = "SELECT id FROM \"user\" WHERE username=:username";
$statement1 = $db->prepare($query);
$statement1->bindValue(':username', $username);
$result1 = $statement1->execute();

$query2 = "SELECT id FROM \"user\" WHERE email=:email";
$statement2 = $db->prepare($query);
$statement2->bindValue(':email', $email);
$result2 = $statement2->execute();

if($result1 || $result2) {
	$_SESSION['create_error'] = "Username or email already in use!";
	header("Location: signUp.php");
	die(); 
}

$username = htmlspecialchars($username);

// Get the hashed password.
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


$query3 = "INSERT INTO \"user\"(username,email,password) VALUES(:username,:email,:password)";
$statement3 = $db->prepare($query);
$statement3->bindValue(':username', $username);
$statement3->bindValue(':email', $email);
$statement3->bindValue(':password', $hashedPassword);

$statement3->execute();

header("Location: home.php");
die(); 

?>