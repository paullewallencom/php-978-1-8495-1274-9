<?php
	session_start();

	$booksInfo = $_SESSION['cart'];
	if(count($booksInfo) > 0)
	{
		$bookFound = false;
		for($i=0; $i< count($booksInfo); $i++)
		{
			if($booksInfo[$i]['bookId'] == $_POST['bookId'])
			{
				$booksInfo[$i]['quantity'] = $_POST['quantity'];
				$bookFound = true;
				break;
			}
		}
	}
	if(!$bookFound)
	{
		$book = array('bookId' => $_POST['bookId'], 'quantity' => $_POST['quantity']);
		array_push($booksInfo, $book);
	}
	$_SESSION['cart'] = $booksInfo;
	
	$grossTotal = 0;
	for($i=0; $i< count($booksInfo); $i++)
	{
		$aBook = $booksInfo[$i];
		$bookName = getBookName($booksInfo[$i]['bookId']);
		$bookPrice = getPriceForBook($booksInfo[$i]['bookId']);
		$totalPrice = $bookPrice  * $booksInfo[$i]['quantity'];
		$grossTotal+= $totalPrice;
		$str.= '<strong>Name - </strong>'.$bookName;
		$str.= '<br/>';
		$str.= ' <strong>Copies - </strong>'.$booksInfo[$i]['quantity'];
		$str.= '<br/>';
		$str.= '<strong>Price - </strong>$'.$bookPrice. ' * ' .$booksInfo[$i]['quantity'].' = $'.$totalPrice;
		$str.= '<br/><br/>';
	}
	$str.= '<strong>Net Amount - </strong>$'.$grossTotal;
	echo $str;
	
	
	function getBookName($id)
	{
		$objXML = simplexml_load_file('books.xml');
		foreach($objXML->book as $book)
		{
			if($book['id'] == $id)
			{
				return $book->name;
			}
		}
		return false;		
	}
	function getPriceForBook($id)
	{
		$objXML = simplexml_load_file('books.xml');
		foreach($objXML->book as $book)
		{
			if($book['id'] == $id)
			{
				return $book->price;
			}
		}	
		return false;
	}
?>