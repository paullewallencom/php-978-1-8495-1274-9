<?php
	define('API_KEY', 'your-API-key-here');
	$url = 'http://api.flickr.com/services/rest/?method=flickr.photos.search';
	$url.= '&api_key='.API_KEY;
	$url.= '&tags='.$_POST['tag'];
	$url.= '&per_page='.$_POST['numImages'];
	$url.= '&format=json';
	$url.= '&nojsoncallback=1';
	
	header('Content-Type:text/json;');
	echo file_get_contents($url);
?>
