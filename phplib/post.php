<?php
    $file = '../data/results.txt';  

	$result;

	
	$data = json_decode($_POST);

	$inp = file_get_contents($file);
	$tempArray = json_decode($inp,true);
	
	if ($tempArray != NULL){
		array_push($tempArray, $data);
		$jsonData = json_encode($tempArray,true);
		file_put_contents($file, $jsonData);
		$result = $jsonData;
	} else {
		file_put_contents($file, json_encode($data));
		$result = json_encode($data);
	}

	echo $result;
	//echo json_decode($_POST);

?>