<?php
	$database = "marktplaats";
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";

	$dbConnect = mysqli_connect($dbHost, $dbUser, $dbPass, $database);
	if(!$dbConnect){
		echo "Unable to connect with the database" . PHP_EOL;
	} else {
		$categoriesSql = "SELECT * FROM categories";
		$categorieResult = mysqli_query($dbConnect, $categoriesSql);
		$categorieData = array();
		while ($row = mysqli_fetch_assoc($categorieResult))
		{
			$categorieData[] = $row;
		}


		$productsSql = "SELECT * FROM advertisements";
		$productsResult = mysqli_query($dbConnect, $productsSql);
		$productsData = array();
		while ($rowd = mysqli_fetch_assoc($productsResult))
		{
			$productsData[] = $rowd;
		}


		$citiesSql = "SELECT * FROM cities";
		$citiesResult = mysqli_query($dbConnect, $citiesSql);
		$citiesData = array();
		while ($rowd = mysqli_fetch_assoc($citiesResult))
		{
			$citiesData[] = $rowd;
		}


		//$categoriesOrdered = "SELECT * "
	}
?>