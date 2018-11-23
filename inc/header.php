<?php require("inc/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script src="js/menu.js"></script>

</head>
<body>
	<header id="header-bar">
		<a href="#" onclick="showMenu()">Categorieën</a>

		<form id="search-group" autocomplete="off">
			<input type="search" id="search" name="search_input" placeholder="Zoek naar product..."/><select name="search_cat">
				<?php
				foreach($categorieData as $row){
					$result = "<option value='";
					$result .= $row["ID"];
					$result .= "'>";
					$result .= $row["CatName"];
					$result .= "</option>";
					echo $result;
				}
				?>
			</select><input type="submit" value="zoek"/>
		</form>

		<!-- <a href="index.php?page=signup">registreren</a> -->
		<!-- <a href="#" onclick="showLogin()">inloggen</a> -->
		<button href="#dddd" onclick="location.href='index.php?page=place'">plaats artikel</button>
	</header>
	<section id="submenu">
		<ul>
			<?php
			foreach($categorieData as $row){
				$result = "<a href='categorie.php?id=";
				$result .= $row["ID"];
				$result .= "'><li>";
				$result .= $row["CatName"];
				$result .= "</li></a>";
				echo $result;
			}
			?>
		</ul>
	</section>

 	<section id="login">

	</section>