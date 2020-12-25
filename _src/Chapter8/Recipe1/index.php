<html>
	<head>
		<style type="text/css">
		body{ font-family: "Trebuchet MS", Verdana, Arial;width:600px; }
		div {	background-color: #F5F5DC;	}
		</style>
	</head>
	<body>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'exampleDB');
if ($mysqli->connect_errno) 
{
    die('Unable to connect!');
}
else
{
	$query = 'SELECT * FROM language';
	if ($result = $mysqli->query($query)) 
	{
		if ($result->num_rows > 0) 
		{
?>	
			<p>
				Select a language
				<select id="selectLanguage">
					<option value="">select</option>
<?php		
			while($row = $result->fetch_assoc()) 
			{
?>		
				<option value="<?php echo $row['id']; ?>"><?php echo $row['languageName']; ?></option>		
<?php			
			}
?>
				</select>
		</p>
		<p id="result"></p>
<?php
		}
		else 
		{
			echo 'No records found!';
		}
		$result->close();
	}
	else 
	{
		echo 'Error in query: $query. '.$mysqli->error;
	}
}
$mysqli->close();
?>
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#selectLanguage').change(function()
				{
					if($(this).val() == '')	return;
					$.get(
						'results.php',
						{ id : $(this).val() },
						function(data)
						{
							$('#result').html(data);
						}
					);
				});
			});
		</script>
	</body>
</html>
