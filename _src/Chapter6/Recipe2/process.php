<?php
	sleep(5);
	$str = 'Your follwing information has been submitted:';
	$str.= '<br>';
	$str.= 'Name - '. $_POST['name'];
	$str.= '<br>';
	$str.= 'Address - '. $_POST['address'];
	$str.= '<br>';
	$str.= 'City - '. $_POST['city'];
	$str.= '<br>';
	$str.= 'Country - '. $_POST['country'];
	echo $str;
?>