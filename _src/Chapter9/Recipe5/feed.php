<?php
	$feedData = file_get_contents('http://vijayjoshi.org/feed');
	header('Content-type:text/xml;');
	echo $feedData;
?>
