<?php
$mysqli = new mysqli('localhost', 'root', '', 'exampleDB');

if (mysqli_connect_errno()) 
{
    echo 'false';
}
else
{
	$query = 'SELECT username FROM users where username like "%'. $_GET['input']. '%"';
	if ($result = $mysqli->query($query)) 
	{
		if ($result->num_rows > 0) 
		{
			$arr = array();
			while($row = $result->fetch_array()) 
			{
				array_push($arr, $row[0]);
			}
			echo json_encode($arr);
		}
		else
		{
			echo 'false';
		}
	}
	else
	{
		echo 'false';
	}
}
?>