<?php
	$bookId = $_GET['id'];
	$action = $_GET['action'];
	$strResponse;
	$objXML = simplexml_load_file('../common.xml');
	foreach($objXML->book as $book)
	{
		if($book['index'] == $bookId)
		{
			if($action == 'year')
			{
				$strResponse = 'This book was published in year:'. $book->name['year'];
			}
			else if($action == 'stories')
			{
				$stories = $book->story;
				$strResponse = '<ul>';
				foreach($stories as $story)
				{
					$strResponse.= '<li>'. $story->title. '</li>';;
				}
				$strResponse.= '</ul>';
			}
			else
			{
				$strResponse = 'Nothing to do'; 
			}
			break;
		}
	}
	echo $strResponse;
?>