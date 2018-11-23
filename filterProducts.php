<?php
require_once("inc/config.php");
$city = $_GET["city"];

if(isset($_GET["id"])){
	$catId = $_GET["id"];

		$productsWhereSql = "SELECT *
		FROM advertisements
		INNER JOIN cities ON advertisements.CityID = cities.ID
		WHERE CatID='$catId' AND CityID = '$city'";


	// $productsWhereSql = "SELECT *
	// FROM advertisements WHERE CityID = '$city' AND CatID = '$catId'";
} else {
	$productsWhereSql = "SELECT *
	FROM advertisements
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CityID = '$city'";
}
	$productsWhereSqlResult = mysqli_query($dbConnect, $productsWhereSql) or die("error");
	$productsWhereSqlData = array();
	while ($rowd = mysqli_fetch_assoc($productsWhereSqlResult))
	{
				$productsWhereSqlData[] = $rowd;
	}

		foreach($productsWhereSqlData as $data){
		$price = str_replace('.', ',', $data['Price']);
		$result = "<a href='product.php?id=";
		$result .= $data['ID'];
		$result .= "'>";
		$result .= "<article>";
		$result .= "<img src='images/";
		$result .= $data['ImageName'];
		$result .= "'/>";
		$result .= "<h3>" . $data['Title'] . "</h3>";
		$result .= "<h2 class='price'>" . $price . "</h2>";
		$result .= "<h1>" . $data["CityName"] . "</h1>";
		$result .= "<section class='reviewsimages'>";

		for($i = 0; $i < $data["Rating"]; $i++){
			$result .= '<img src="images/star.png" alt="star">';
		}

		$result .= "</section>";
		$result .= "</article>";
		$result .= "</a>";
		echo $result;
	}
?>