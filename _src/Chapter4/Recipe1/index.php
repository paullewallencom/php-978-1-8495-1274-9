<?php
	$travelDetails = array(
		'origin' => 'Delhi',
		'destination' => 'London',
		'passengers' => array
			(
				array('name' => 'Mr. Perry Mason', 'type' => 'Adult', 'age'=> 28),
				array('name' => 'Miss Irene Adler', 'type' => 'Adult', 'age'=> 28)
			),
		'travelDate' => '17-Dec-2010'
	);
	echo json_encode($travelDetails);
/*
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
			"age":28
		}
	],
	"travelDate":"17-Dec-2010"
}
*/
?>
