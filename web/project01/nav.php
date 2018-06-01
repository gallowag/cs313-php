<?php

$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

?>

<h1>Greer Galloway</h1>

<nav class="navbar navbar-dark">
	<div class="container-fluid">
	<ul class="nav navbar-nav">

		<li class="nav-item<?php if ($file === 'home') echo 'active' ?>">
			<a href="home.php">Home</a>
		</li>

		<li class="nav-item<?php if ($file === 'dramas') echo 'active' ?>">
			<a href="dramas.php">About</a>
		</li>

		<li class="nav-item<?php if ($file === 'about') echo 'active' ?>">
			<a href="about.php">About</a>
		</li>
		
	</ul>
	</div>
</nav>