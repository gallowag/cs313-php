<?php

$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

?>

<h1>Make your own Mountain, Inc.</h1>

<nav class="navbar navbar-inverse">
	<ul class="nav navbar-nav">


		<li class="nav-item <?php if ($file === 'about') echo 'active' ?>">
			<a href="about.php">About Us</a>
		</li>

		<li class="nav-item <?php if ($file === 'home') echo 'active' ?>">
			<a href="home.php">Home</a>
		</li>

		<li class="nav-item <?php if ($file === 'assignments') echo 'active' ?>">
			<a href="assignments.php">Login</a>
		</li>
	<ul>
</nav>