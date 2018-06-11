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

			//get drama info
			require("dbConnect.php");
			$db = get_db();
			
			$query1 = "SELECT username FROM \"user\" WHERE id=:id";
			$statement1 = $db->prepare($query1);
			$statement1->bindValue(":id", $id, PDO::PARAM_INT);
			$statement1->execute();

			$row1 = $statement1->fetch();

			$username = $row1["username"];
		
			echo "<ul class=\"nav navbar-nav navbar-right\"><li><a href=\"userDetails.php\">Welcome, $username</a></li></ul>";
		} else {
			echo "<ul class=\"nav navbar-nav navbar-right\"><li><a href=\"home.php\">Sign In</a></li></ul>";
		}	
	?>
	</div>
</nav>