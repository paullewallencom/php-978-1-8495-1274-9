<html>
	<head>
		<title>Modifying xml with</title>
	<style type="text/css">
		ul{border:1px solid black;padding:5px;list-style:none;width:350px;}
		label{float:left;width:100px;}
	</style>
	</head>
	<body>
		<ul>
			<li>
				<label for="bookList">Book:</label>
				<select id="bookList">
					<option value="">select a book</option>		
					<?php
						$objXML = new DOMDocument();
						$objXML->load('../common.xml', LIBXML_NOBLANKS);
						$books = $objXML->getElementsByTagName('book');
						foreach($books as $book)
						{
							echo '<option value="'.$book->attributes->item(0)->value.'">'.$book->firstChild->nodeValue.'</option>';
						}
					?>
				</select>
			</li>
			<li>
				<label for="storyName">Story Name</label><input type="text" id="storyName" value=""/>
			</li>
			<li>
				<label for="quote">Quote</label><textarea id="quote"></textarea>
			</li>
			<li>
				<input type="button" id="add" value="Add new story"/>
			</li>
		</ul>
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function ()
			{
				$('#add').click(function()
				{
					$.post(
						'process.php', 
						{ bookId: $('#bookList').val() , storyTitle: $('#storyName').val(), quote: $('#quote').val() },
						function(data)
						{
							$('#add').after(data);
						});
				});
			});
		</script>
	</body>
</html>
