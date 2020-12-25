<?php
	$bookId = $_POST['bookId'];
	$title = $_POST['storyTitle'];
	$quote = $_POST['quote'];
	$objXML = new DOMDocument();
	$objXML->load('../common.xml', LIBXML_NOBLANKS);
	$books = $objXML->getElementsByTagName('book');
	foreach($books as $book)
	{
		if($book->attributes->item(0)->value == $bookId)
		{
			$story = $objXML->createElement('story');
			$title = $objXML->createElement('title', $title);
			$quote = $objXML->createElement('quote', $quote);
			$story->appendChild($title);
			$story->appendChild($quote);
			$book->appendChild($story);
			break;
		}
	}
	if($objXML->save('../common1.xml') != FALSE)
	{
		echo 'New story added successfully.';
	}
	else
	{
		echo 'An error occured.';
	}
?>