<?php require("inc/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	<script src="js/menu.js"></script>
</head>
<body>
	<header id="header-bar">
		<a href="#" onclick="showMenu()">bladeren</a>

		<form id="search-group" autocomplete="off">
			<input type="search" name="search_input" placeholder="Zoek naar product..."/><select name="search_cat">
				<?php
				foreach($categorieData as $row){
					$result = "<option value='";
					$result .= $row["ID"];
					$result .= "'>";
					$result .= $row["Name"];
					$result .= "</option>";
					echo $result;
				}
				?>
			</select><input type="submit" value="zoek"/>
		</form>

		<a href="index.php?page=signup">registreren</a>
		<a href="#" onclick="showLogin()">inloggen</a>
		<button href="#dddd" onclick="location.href='index.php?page=place'">plaats artikel</button>
	</header>
	<section id="submenu">
		<ul>
			<?php
			foreach($categorieData as $row){
				$result = "<a href='catergorie.php?id=";
				$result .= $row["ID"];
				$result .= "'><li>";
				$result .= $row["Name"];
				$result .= "</li></a>";
				echo $result;
			}
			?>
		</ul>
	</section>
	<section id="login">
		<form action="" id="login-form">
			<input type="text" placeholder="email">
			<input type="password" placeholder="password">
			<input type="submit" value="inloggen">
		</form>
	</section>