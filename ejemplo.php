<?php

$vector=array();

$vector[0]="linda";
$vector[1]="es";
$vector[2]="fruta";
$vector[3]="la";
$vector[4]="reina";
$vector[5]="frutita";
$i=0;
foreach ($vector as $key) {
	echo $key.'<br>';
	echo $i.'<br>';

	if($i==1){
		echo "Entrooo";
		unset($vector[1]);
		unset($vector[2]);
		unset($vector[3]);
		unset($vector[4]);

		foreach ($vector as $key) {
			echo $key.'<br>';

		}
echo "Salió";
		$vector=array_values($vector);

	}
	
	$i++;

}

foreach ($vector as $key) {
	echo $key.'<br>';

}


