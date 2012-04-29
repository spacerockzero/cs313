<?php
    
 	// $file = '../data/results.txt';  

	// $result;
	
	//$data = json_decode($_POST,true); //$_POST is an array containing the serialized form results object



	// $tempArray = json_decode(file_get_contents($file));

	// //$tempArray = $fileData; //$tempArray should be reading an array of PHP objects from the txt file
	
	// if ($tempArray != NULL){

	// 	array_push($tempArray, $data);
	// 	$jsonData = json_encode($tempArray);
	// 	file_put_contents($file, $jsonData);
	// 	$result = json_encode($tempArray);

	// } else {
		
	// 	//$data = json_encode($data);
	// 	file_put_contents($file, json_encode($data));
	// 	$result = json_encode($data);

	// }

	// $result = file_get_contents($file);
	
	// echo $result;



	print "Gender: ".$_POST['gender']."<br/>";
	print "Favorite sci-fi TV franchise: ".$_POST['tv_franchise']."<br/>";
	print "Favorite Star Wars Movie: ".$_POST['star_wars_movie']."<br/>";
	print "Favorite Star Trek TV Show: ".$_POST['star_trek_tv_show']."<br/>";
	print "Favorite Star Trek Movie: ".$_POST['star_trek_movie']."<br/>";

?>