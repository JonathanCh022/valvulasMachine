<?php


$conn = mysqli_connect("localhost", "root", "", "machine_mvc");

$result = mysqli_query($conn,'select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = "valvulas"');        




$datos = array();

while ($row = mysqli_fetch_array($result)) {
	$datos[] = $row["COLUMN_NAME"];
}



 $output = json_encode( array('columnas' => $datos));

header("Content-type:application/json");
 echo $output;
?>