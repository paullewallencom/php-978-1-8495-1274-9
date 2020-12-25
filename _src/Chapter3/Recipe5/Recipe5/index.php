<?php
    $objXML = new DOMDocument('1.0', 'utf-8' );
	$books = $objXML->createElement('books');
	
	$book = $objXML->createElement('book');
	$attrIndex = new DOMAttr("index", "4");
	$book->appendChild($attrIndex);
	$bookName = $objXML->createElement('name','The case book of sherlock holmes');
	$attrYear = new DOMAttr("year", "1894");
	$bookName->appendChild($attrYear);

	$book->appendChild($bookName);
	
	$story = $objXML->createElement('story');
	$title = $objXML->createElement('title', 'Tha case of ....');
	$quote = $objXML->createElement('quote', 'Yet another quote');
	
	$story->appendChild($title);
	$story->appendChild($quote);
	
	$book->appendChild($story);
	
	$books->appendChild($book);

	$objXML->appendChild($books);
	
	if($objXML->save('new.xml') != FALSE)
	{
		echo 'XML file generated successfully.';
	}
	else
	{
		echo 'An error occured.';
	}
?>