<?php
	session_start();
	$booksInfo  = array();
	$_SESSION['cart'] = $booksInfo;
?>
<html>
	<head>
        <title>Cart</title>
		<style type="text/css">
			body{ font-family:"trebuchet MS",Arial;font-size:14px;width:500px;}
			div
			{
				border:1px solid black;
				padding:20px;
				width:250px;
				margin-top:10px;
			}
			.cart
			{
				border:1px solid black;
				float:right;
				right:50px;
				position:absolute;
				width:300px;
				padding:10px;
			}

		</style>
	</head>
	<body>
		<div class="cart">
			<strong>Your Cart</strong>
			<p id="cart">Cart is empty</p>
		
		</div>
		<?php
		$objXML = simplexml_load_file('books.xml');
		foreach($objXML->book as $book)
		{
			echo '<div>';
			echo 'Name - '. $book->name,'<br/>';
			echo 'Price - $'. $book->price,'<br/>';
		?>
			Quantity - 
			<select>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="4">3</option>
			</select>
			- 
			<input type="hidden" value="<?php echo $book['id']; ?>"/>
			<input type="button" value="select this book"/>
		<?php			
			echo '</div>';
		}
		?>
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$('input:button').click(function()
			{
				$.post('calculate.php',
					{
						bookId : $(this).prev('input:hidden').val(),
						quantity: $(this).prev().prev('select').val()
					},
					function(data)
					{
						$('#cart').html(data);
					}
				)
			});
		});
		</script>
	</body>
</html>