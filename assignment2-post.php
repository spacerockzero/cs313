<?php
    
 	$file = 'data/results.txt'; 

 	//$_POST is a PHP array
 	$id = $_POST;

 	//Convert PHP array to PHP Object
 	$idObject = new stdClass();
 	foreach ($id as $key => $value)
	{
	    $idObject->$key = $value;
	}

	//file is in JSON format
 	$fileJSON = file_get_contents($file);
 	
 	//decode file's JSON format back into a php array
 	$fileArray = json_decode($fileJSON);
 	
 	//check if there is an array in txt file
 	if ($fileJSON != '') {
 		//all is good
 	}
 	else {
 		//source file empty
 		$fileArray = json_decode('[]');
 	}

 	//push id object into fileArray
 	array_push($fileArray, $idObject);

 	//run survey value counts

 	// function counting(){
 	// 	$count = 0;
 	// 	foreach($fileArray as $object) {
 	// 		$count++;
 	// 	}
 	// }

 	function countOccurrences(prop){
	 	$count = 0;
		foreach ($fileArray as $object) {
		    if ($object->typeId == $prop) {
		    	$count++;
		    }
		}
	}

	//Gender counts
	//$maleCount = countOccurrences("male");





 	//encode fileArray to JSON format
 	$fileJSON = json_encode($fileArray);

 	//write new fileJSON to results.txt
 	file_put_contents($file, $fileJSON);

 	

 	//print print_r($newJSON);
 	//print json_encode($newJSON);
 	print print_r($fileJSON);
 	print "<br/>Object occurrences: ".countOccurrences('male');

?>
<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 2</title>

<?php include('modules/header-bottom.php');?>
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=VT323">
  
  <body id="assignment2">   

<?php include('modules/frame-top.php');?>

            <h1 id="fittext3">Survey Results:</h1>
            <div id="result">
            	<h4>Gender:</h4>
            	Male<br/>
            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
			    	<div class="bar" style="width: 0%"></div>
			    </div>
			    Female<br/>
            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
			    	<div class="bar" style="width: 0%"></div>
			    </div>
            </div> 

<?php include('modules/footer.php');?>        
    
    </body>
    <script type="text/javascript">
    	var json = <?php print $fileJSON; ?>

    	//Gender counts
    	var maleCount = genderCount('male');


    	function genderCount(gender) {
		   var count=0;
		   for(var i in json){
			   for(gender in json[i]) {
			      if (json[i].gender = gender) {
			         ++count;
			      }
			   }
			   return count;
			   console.log("object " + i);
			}
		}
    </script>
</html>







