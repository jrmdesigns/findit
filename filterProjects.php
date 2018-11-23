<?php
require_once("inc/config.php");


//$sort = $_GET["sort"];



//$catId = $_GET["id"];
//$productsWhereSql = "SELECT * FROM advertisements WHERE CatID = '$catId'";
$productsWhereSql = "SELECT *
FROM advertisements
INNER JOIN cities ON advertisements.CityID = cities.ID WHERE ID = 6";
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
		$result .= "<h4 class='time'>Geplaatst: " . $data['Date'] . "</h4>";
		$result .= "</article>";
		$result .= "</a>";
		echo $result;
}

?>