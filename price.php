<?php
require_once("inc/config.php");
if(isset($_GET["city"]) && isset($_GET["id"])){
	$catId = $_GET["id"];
	$city = $_GET["city"];
	$productsWhereSql = "SELECT *
	FROM advertisements
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CityID = '$city' AND CatID = '$catId' ORDER BY Price";
} else if(isset($_GET["id"])){
	$catId = $_GET["id"];
	$productsWhereSql = "SELECT *
	FROM advertisements
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CatID = '$catId' ORDER BY Price";
} else if(isset($_POST['city']) && !isset($_GET["id"])){
	$city = $_GET["city"];
	$productsWhereSql = "SELECT *
	FROM advertisements
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CityID = '$city' ORDER BY Price";
} else{
	$productsWhereSql = "SELECT * FROM advertisements
	INNER JOIN cities ON advertisements.CityID = cities.ID
	ORDER BY Price";
}

$productsWhereSqlResult = mysqli_query($dbConnect, $productsWhereSql);
	$productsWhereData = array();
	while ($rowd = mysqli_fetch_assoc($productsWhereSqlResult))
	{
				$productsWhereData[] = $rowd;
	}

		foreach($productsWhereData as $data){
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
