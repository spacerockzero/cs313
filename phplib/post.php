<?php
    $file = '../data/scifi_results.txt';

    $json = file_get_contents($file);

    echo "$json = ".$json;

 //    $data = json_decode($json);
	// $data[] = $_POST['scifi_form'];
	// file_put_contents($file, json_encode($_POST));
	

	//echo "POST = ".print_r (json_encode($_POST));

	//$data[] = $_POST['scifi_form'];
    //file_put_contents('data/scifi_results.txt', json_encode($_POST['scifi_form'];);
    // header( 'Location: ../assignments.php' ) ;
	//echo "json = ".$json." POST = ".print_r ($_POST);
?>