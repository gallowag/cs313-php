<?php

session_start();

//get lego item info
$lego = $_POST["lego"];

//add it into the session
if(isset($_SESSION[$fruit]))
	$_SESSION[$fruit] += 1;
else
	$_SESSION[$fruit] = 1;

//header("Location: {$_SERVER['HTTP_REFERER']}");
?>