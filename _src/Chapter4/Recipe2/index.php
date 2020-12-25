<?php
$json = <<<JSON
{
	"origin":"Delhi",
	"destination":"London",
	"passengers":
	[
		{
			"name":"Mr. Perry Mason",
			"type":"Adult",
			"age":28
		},
		{
			"name":"Miss Irene Adler",
			"type":"Adult",
			"age":25
		}
	],
	"travelDate":"17-Dec-2010"
}
JSON;
echo '<pre>';
$objJson = json_decode($json);
print_r ($objJson);
echo '</pre>';
?>