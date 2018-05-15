<?php

session_start();

//get lego item info
$lego = $_POST["lego"];

//remove it from the session
if($_SESSION[$lego] == 1)
	unset($_SESSION[$lego]);
else
	$_SESSION[$lego] -= 1;


header("Location: {$_SERVER['HTTP_REFERER']}");
?>