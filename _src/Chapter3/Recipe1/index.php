<pre>
<?php
libxml_use_internal_errors(true);
$objXML = simplexml_load_file('C:\xampp\htdocs\book\chapter3\common.xml');
if (!$objXML) 
{
	$errors = libxml_get_errors();
    foreach($errors as $error) 
	{
        echo $error->message,'<br/>';
    }
}
else
{
	foreach($objXML->book as $book)
	{
		echo $book->name,'<br/>';
	}
}
?>
