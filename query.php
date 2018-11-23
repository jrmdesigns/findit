<?php
include("inc/config.php");
$sql = "SELECT * FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
";
if(isset($_GET["id"])){
	$catId = $_GET["id"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CatID = '$catId'";
}

if(isset($_GET["city"])){
	$city = $_GET["city"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CityID = '$city'";
}

if(isset($_GET["sort"])){
	$sort = $_GET["sort"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID ORDER BY Price";
}

if(isset($_GET["id"]) && isset($_GET["city"])){
	$catId = $_GET["id"];
	$city = $_GET["city"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CatID = '$catId' AND CityID = '$city'";
}

if(isset($_GET["city"]) && isset($_GET["sort"])){
	$city = $_GET["city"];
	$sort = $_GET["sort"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CityID = '$city' ORDER BY Price";
}

if(isset($_GET["id"]) && isset($_GET["sort"])){
	$catId = $_GET["id"];
	$sort = $_GET["sort"];
	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CatID = '$catId' ORDER BY Price";
}

if(isset($_GET["id"]) && isset($_GET["city"]) && isset($_GET["sort"])){
	$catId = $_GET["id"];
	$city = $_GET["city"];
	$sort = $_GET["sort"];

	$sql = "SELECT *
	FROM advertisements
	INNER JOIN categories ON advertisements.CatID = categories.ID
	INNER JOIN cities ON advertisements.CityID = cities.ID
	WHERE CatID = '$catId' AND CityID = '$city' ORDER BY Price";
}
	$result = mysqli_query($dbConnect, $sql);
	$data = array();
	while ($rowd = mysqli_fetch_assoc($result))
	{
			$data[] = $rowd;
	}

	foreach($data as $row){
		$price = str_replace('.', ',', $row['Price']);
		$result = "<a href='product.php?id=";
		$result .= $row['ID'];
		$result .= "'>";
		$result .= "<article>";
		$result .= "<img src='images/";
		$result .= $row['ImageName'];
		$result .= "'/>";
		$result .= "<h3>" . $row['Title'] . "</h3>";
		$result .= "<h2 class='price'>" . $price . "</h2>";
		$result .= "<h1>" . $row["CityName"] . "</h1>";
		$result .= "<section class='reviewsimages'>";

		for($i = 0; $i < $row["Rating"]; $i++){
			$result .= '<img src="images/star.png" alt="star">';
		}

		$result .= "</section>";
		$result .= "</article>";
		$result .= "</a>";
		echo $result;
		}
?>