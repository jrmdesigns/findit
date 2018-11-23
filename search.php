<?php
include("inc/config.php");
// $dbConnect = mysqli_dbConnect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbConnect, $_POST["query"]);
 $query = " SELECT * 	FROM advertisements
			INNER JOIN categories ON advertisements.CatID = categories.ID
			INNER JOIN cities ON advertisements.CityID = cities.ID
  			WHERE Title LIKE '%".$search."%' OR CatName LIKE '%".$search."%'";
}
else
{
 $query = "SELECT * FROM advertisements ORDER BY ID
 ";
}
$result = mysqli_query($dbConnect, $query);
if(mysqli_num_rows($result) > 0)
{

$output = "<ul>";
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <li>
    '.$row["Title"].'
   </li>
  ';
 }
 $output .= "</ul>";
 echo $output;
}
else
{
 echo 'Geen zoekresultaten';
}

?>