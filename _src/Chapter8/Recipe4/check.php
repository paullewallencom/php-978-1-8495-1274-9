<?php
$mysqli = new mysqli('localhost', 'root', '', 'exampleDB');
if (mysqli_connect_errno()) 
{
	echo 0;
	exit();
}
$selectQuery = 'SELECT username as user FROM users WHERE username="'.$_POST['username'].'" limit 1';
$result = $mysqli->query($selectQuery);
if($result)
{
	if ($result->num_rows > 0) 
	{
		echo false;
	}
	else
	{
		echo true;
	}
}
else
{
	echo false;
}

	

?>