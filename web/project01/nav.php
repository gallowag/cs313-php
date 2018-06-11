<?php

$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);



?>

<br>
<h1>Drama View</h1>

<nav class="navbar navbar-default">
	<div class="container-fluid">
	<ul class="nav navbar-nav">

		<li class="nav-item<?php if ($file === 'home') echo 'active' ?>">
			<a href="home.php">Home</a>
		</li>

		<li class="nav-item<?php if ($file === 'dramas') echo 'active' ?>">
			<a href="dramas.php">Dramas</a>
		</li>

		<li class="nav-item<?php if ($file === 'actors') echo 'active' ?>">
			<a href="actors.php">Actors</a>
		</li>
		
	</ul>
	<?php
		session_start();
		if(isset($_SESSION['id'])) {
			$id = $_SESSION['id'];
			echo "<ul class="nav navbar-nav navbar-right"><li>Welcome, $id</li></ul>";
		} else {
			echo "<ul class="nav navbar-nav navbar-right"><li><a href=\"home.php\">Sign In</a></li></ul>";
		}	
	?>
	</div>
</nav>