<html>
	<head>
		<style type="text/css">
		body{ font-family: "Trebuchet MS", Verdana, Arial; width:500px; }
		input,textarea { vertical-align:top; }
		label{ float:left; width:150px;}
		</style>
	</head>
	<body>
<?php
$mysqli = new mysqli('localhost', 'root', '', 'exampleDB');
if(isset($_POST['save']))
{
	$language = $mysqli->real_escape_string($_POST['language']);
	$functionName = $mysqli->real_escape_string($_POST['functionName']);
	$summary = $mysqli->real_escape_string($_POST['summary']);
	$example = $mysqli->real_escape_string($_POST['example']);
	$query = 'INSERT INTO functions (
			languageId ,
			functionName ,
			summary ,
			example
			) 
			VALUES ('.$language.', "'.$functionName.'", "'.$summary.'","'.$example.'")';
			
	if ($mysqli->query($query))
	{
		echo 'Data Saved Successfully.';
	}
	else
	{
		echo 'Cannot save data.';
	}
	
}
$query = 'SELECT * FROM language';
if ($result = $mysqli->query($query)) 
{
	if ($result->num_rows > 0) 
	{
?>
		<fieldset>
		<legend><strong>Add a function</strong></legend>
		<form action="" method="post" id="frmMain">
			<p>
				<label>Select a language</label>
					<select name="language" class="required">
						<option value="">select</option>
<?php		
						while($row = $result->fetch_array()) 
						{
?>		
							<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>		
<?php			
						}
?>
					</select>
			</p>
			<p>
				<label>Function name </label> <input type="text" name="functionName"  class="required"/>
			</p>
			<p>
				<label>Summary</label> <input type="text" name="summary" class="required"/>
			</p>
			<p>
				<label>Example</label> <textarea rows="10" cols="30" name="example" class="required"></textarea>
			</p>
			<p>
				<strong id="error"></strong>
			</p>
			<p>
				<input type="submit" name="save" value="Save Information"/>
			</p>
		</form>
		</fieldset>
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

$mysqli->close();
?>
		<script type="text/javascript" src="../jquery.js"></script>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#frmMain').submit(function()
				{
					var flag = true;
					$('#error').empty();
					$('.required').each(function()
					{
						if(jQuery.trim($(this).val()) == '' )
						{
							flag = false;
						}
					});
					if(!flag)
					{
						$('#error').html('Please fill all the fields');
						return false;
					}
					else
					{
						return true;
					}
				});
			});
		</script>
	</body>
</html>
