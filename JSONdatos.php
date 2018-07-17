<?php


$conn = mysqli_connect("localhost", "root", "", "machine_mvc");

 mysqli_set_charset( $conn, 'utf8');

$result = mysqli_query($conn,'SELECT * FROM valvulas');   


$datos = array();

while ($row = mysqli_fetch_array($result)) {
	$datos[] = $row;
}

 $output = json_encode( array('records' => $datos)); 

header("Content-type:application/json");
 echo $output; 




?>