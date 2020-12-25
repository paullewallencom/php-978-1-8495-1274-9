<?php
if(isset($_POST['vote']))
{
	if(isset($_COOKIE["voted"]))
	{
		$message = 'You have already voted. You cannot vote more then once per day.';
	}
	else
	{
		$message = 'Your vote has been saved';
		$dom = new DOMDocument();
		$dom->load('browsers.xml');

		$xpath = new DomXPath($dom);
		$units = $xpath->query('//browser');

		foreach ($units as $unit)
		{
			$value = $unit->getAttribute('value');
			if($value == $_POST['browser'])
			{
				$votes = $unit->getAttribute('votes');
				$unit->setAttribute('votes', ++$votes);
				
				setcookie("voted", true, time()+ (24*60*60));  /* expire in 24 hours */
				break;
			}
			
		}
		$dom->save('browsers.xml');
	}
}
?>
<html>
	<head>
		<title></title>
		<style type="text/css">
		body{font-family:"Trebuchet MS",verdana;width:350px;}
		ul{list-style:none;}
		</style>
	</head>
	<body>
		<form method="post">
			<fieldset>
				<legend>Which is your favorite browser?</legend>
				<ul>
		<?php
				$dom = new DOMDocument();
				$dom->load('browsers.xml');
				$xpath = new DomXPath($dom);
				$browsers = $xpath->query('//browser');

				foreach ($browsers as $browser)
				{
					$checked = $_POST['browser'] == $browser->getAttribute('value')? 'checked': '';
					echo '<li><input type="radio" '.$checked.' name="browser" value="'.$browser->getAttribute('value').'">'.$browser->getAttribute('name').'</li>';
				}
		?>
					<li style="color:red;"><?php echo $message; ?></li>
					<li><input type="submit" name="vote" value="vote" /> OR <a href="results.php" id="results">View Results</a></li>
				</ul>
			</fieldset>
		</form>
	</body>
</html>