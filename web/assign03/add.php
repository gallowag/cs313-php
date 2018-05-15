<?php

session_start();

//get lego item info
$lego = $_POST["lego"];

//add it into the session
if(isset($_SESSION[$lego]))
	$_SESSION[$lego] += 1;
else
	$_SESSION[$lego] = 1;


header("Location: {$_SERVER['HTTP_REFERER']}");
?>