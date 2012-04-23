<?php
    $json = file_get_contents('../data/scifi_results.json');
    $data = json_decode($json);
    $data[] = $_POST['scifi_form'];
    file_put_contents('../data/scifi_results.json', json_encode($data);
    //header( 'Location: assignment2.php' ) ;
?>