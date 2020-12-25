<?php
$mysqli = new mysqli('localhost', 'root', '', 'exampleDB');

if (mysqli_connect_errno()) 
{
    die('Unable to connect!');
}
$query = 'SELECT cityName, cityRating FROM cities';
$arr = array();
if ($result = $mysqli->query($query)) 
{
    if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			array_push($arr, array('city' => $row['cityName'], 'rating' => $row['cityRating']));
		}
	}
}
$result = array('tags' => $arr);
header('Content-Type:text/json');
echo json_encode($result);
?>
