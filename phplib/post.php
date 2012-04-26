<?php
    $file = '../data/results.txt';  

	$result;

	
	$data = $_POST; //$_POST is an array containing the serialized form results object

	$tempArray = file_get_contents($file); //$tempArray should be reading an array of PHP objects from the txt file
	
	if ($tempArray != NULL){
		array_push($tempArray, $data);
		//$jsonData = json_encode($tempArray,true);
		file_put_contents($file, $tempArray);
		$result = json_encode($tempArray);
	} else {
		file_put_contents($file, json_encode($data));
		$result = json_encode($data);
	}

	echo $result;
	//echo print_r($data);

?>