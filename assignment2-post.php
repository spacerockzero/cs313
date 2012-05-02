<?php
if(isset($_POST['submitForm'])) {
	//set cookie to prevent users from voting twice on the same browser
	setcookie("voted", "true", time()+3600);  // set the cookie
	//print_r($_COOKIE);
}
session_start();
// print print_r($_POST)."<br/>";
// print print_r($_SESSION)."<br/>";
// print "cookie = ".$_COOKIE['voted']."<br/>";
// print "session = ".$_SESSION['voted']."<br/>";
global $voted;

if(isset($_SESSION['voted'])) {
	//echo "Already voted SESSION detection<br/>";
	$voted = $_SESSION['voted'];
} else {
	//echo "Haven't voted yet<br/>";
}

//General Variables
 	$file = 'data/results.txt'; 

 	//$_POST is a PHP array
 	if (isset($_POST['submitForm']) && $voted != 'true'){

 		$id = $_POST;

	 	//Convert PHP array to PHP Object
	 	$idObject = new stdClass();
	 	foreach ($id as $key => $value)
		{
		    $idObject->$key = $value;
		}
	}

	//file is in JSON format
 	$fileJSON = file_get_contents($file);
 	
 	//json_encode()/json_decode() workaround for servers running < php 5.2
	if ( !function_exists('json_decode') ){
	    function json_decode($content, $assoc=false){
	                require_once('phplib/JSON.php');
	                if ( $assoc ){
	                    $json = new Services_JSON(SERVICES_JSON_LOOSE_TYPE);
	        } else {
	                    $json = new Services_JSON;
	                }
	        return $json->decode($content);
	    }
	}

	if ( !function_exists('json_encode') ){
	    function json_encode($content){
	                require_once('phplib/JSON.php');
	                $json = new Services_JSON;
	                
	        return $json->encode($content);
	    }
	}


 	//decode file's JSON format back into a php array
 	$fileArray = json_decode($fileJSON);
 	
 	//check if there is an array in txt file
 	if ($fileJSON == '') {
 		//source file empty
 		$fileArray = json_decode('[]');
 	}
 	else {
 		//all is good
 	}

 	if (isset($_POST['submitForm']) && $voted != 'true'){
	 	//push id object into fileArray
	 	array_push($fileArray, $idObject);
	}
 	//encode fileArray to JSON format
 	$fileJSON = json_encode($fileArray);

 	//write new fileJSON to results.txt
 	file_put_contents($file, $fileJSON);


//VOTE COUNTING SECTION

 	//General Counting Functions
 	function countOccurrences($key,$value){
	 	$count = 0;
	 	global $fileArray;
		foreach ($fileArray as $object) {
		    if ($object->$key == $value) {
		    	$count++;
		    }
		}
		return $count;
	}

	function countVotes(){
		$count = 0;
		global $fileArray;
		foreach ($fileArray as $object) {
		    if ($object) {
		    	$count++;
		    }
		}
		return $count;
	}

	//Generate count variables

		//Count all votes
		$voteTotal = countVotes();

		//Gender counts
		$maleCount = countOccurrences('gender','male');
		$femaleCount = countOccurrences('gender','female');

		//TV Franchise Counts
		$battleStarCount = countOccurrences('tv_franchise','Battlestar_Galactica');
		$starTrekCount = countOccurrences('tv_franchise','Star_Trek');
		$starGateCount = countOccurrences('tv_franchise','Stargate');
		$starWarsCloneWarsCount = countOccurrences('tv_franchise','Star_Wars:_Clone_Wars_Animated_Series');
		$cowboyBebopCount = countOccurrences('tv_franchise','Cowboy_Bebop');
		$babylon5Count = countOccurrences('tv_franchise','Babylon_5');
		$farscapeCount = countOccurrences('tv_franchise','Farscape');
		$redDwarfCount = countOccurrences('tv_franchise','Red_Dwarf');
		$fringeCount = countOccurrences('tv_franchise','Fringe');

		//Star Wars Counts
		$starWarsICount = countOccurrences('star_wars_movie','Star_Wars_Episode_I:_The_Phantom_Menace');
		$starWarsIICount = countOccurrences('star_wars_movie','Star_Wars_Episode_II:_Attack_of_the_Clones');
		$starWarsIIICount = countOccurrences('star_wars_movie','Star_Wars_Episode_III:_Revenge_of_the_Sith');
		$starWarsIVCount = countOccurrences('star_wars_movie','Star_Wars_Episode_IV:_A_New_Hope');
		$starWarsVCount = countOccurrences('star_wars_movie','Star_Wars_Episode_V:_The_Empire_Strikes_Back');
		$starWarsVICount = countOccurrences('star_wars_movie','Star_Wars_Episode_VI:_Return_of_the_Jedi');

		//Star Trek TV Counts
		$starTrekTOSCount = countOccurrences('star_trek_tv_show','The_Original_Series');
		$starTrekTASCount = countOccurrences('star_trek_tv_show','The_Animated_Series');
		$starTrekTNGCount = countOccurrences('star_trek_tv_show','The_Next_Generation');
		$starTrekDS9Count = countOccurrences('star_trek_tv_show','Deep_Space_Nine');
		$starTrekVGRCount = countOccurrences('star_trek_tv_show','Voyager');
		$starTrekENTCount = countOccurrences('star_trek_tv_show','Enterprise');

		//Star Trek Movie Counts
		$starTrekICount = countOccurrences('star_trek_movie','Star_Trek:_The_Motion_Picture');
		$starTrekIICount = countOccurrences('star_trek_movie','Star_Trek_II:_The_Wrath_of_Khan');
		$starTrekIIICount = countOccurrences('star_trek_movie','Star_Trek_III:_The_Search_for_Spock');
		$starTrekIVCount = countOccurrences('star_trek_movie','Star_Trek_IV:_The_Voyage_Home');
		$starTrekVCount = countOccurrences('star_trek_movie','Star_Trek_V:_The_Final_Frontier');
		$starTrekVICount = countOccurrences('star_trek_movie','Star_Trek_VI:_The_Undiscovered_Country');
		$starTrekVIICount = countOccurrences('star_trek_movie','Star_Trek_Generations');
		$starTrekVIIICount = countOccurrences('star_trek_movie','Star_Trek:_First_Contact');
		$starTrekIXCount = countOccurrences('star_trek_movie','Star_Trek:_Insurrection');
		$starTrekXCount = countOccurrences('star_trek_movie','Star_Trek_Nemesis');
		$starTrekXICount = countOccurrences('star_trek_movie','Star_Trek_(J.J.Abrams_2009_Reboot)');
 	
 	//DEBUG AREA
 	//print print_r($fileJSON)."<br/>";
 	//print print_r($_SESSION['voted']);
 	// print "<br/>Male occurrences: ".countOccurrences('gender','male');
 	// print "<br/>Total Votes: ".$voteTotal;
 	// echo "<br/>Male % = ". round($maleCount / $voteTotal * 100, 2);
 	// echo "<br/>Female % = ". round($femaleCount / $voteTotal * 100, 2);
 	// echo "<br/>BattleStar Count = ".$battleStarCount;

?>
<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 2</title>

<?php include('modules/header-bottom.php');?>
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=VT323">
  
  <body id="assignment2" class="post">   

<?php include('modules/frame-top.php');?>

            <h1>Survey Results:</h1>
            <div id="result">
            	<h3 class="total_votes">Total Votes: <?php echo $voteTotal ?></h3>
            	
            	<!--Gender-->
            	<div class="survey_group">
	            	<h3>Gender:</h3>
	            	<h5>Male</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($maleCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($maleCount / $voteTotal * 100) ."%, ".$maleCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Female</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($femaleCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($femaleCount / $voteTotal * 100) ."%, ".$femaleCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <br/>
				</div><!--/survey_group-->

				<!--TV Franchise-->
			    <div class="survey_group">
				    <h3>Favorite Sci-Fi TV Franchise:</h3>
	            	<h5>Battlestar Galactica</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($battleStarCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($battleStarCount / $voteTotal * 100) ."%, ".$battleStarCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekCount / $voteTotal * 100) ."%, ".$starTrekCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Stargate</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starGateCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starGateCount / $voteTotal * 100) ."%, ".$starGateCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars: Clone Wars animated series</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsCloneWarsCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsCloneWarsCount / $voteTotal * 100) ."%, ".$starWarsCloneWarsCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Cowboy Bebop</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($cowboyBebopCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($cowboyBebopCount / $voteTotal * 100) ."%, ".$cowboyBebopCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Babylon 5</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($babylon5Count / $voteTotal) * 100 ?>%">
				    		<?php echo round($babylon5Count / $voteTotal * 100) ."%, ".$babylon5Count."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Farscape</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($farscapeCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($farscapeCount / $voteTotal * 100) ."%, ".$farscapeCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Red Dwarf</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($redDwarfCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($redDwarfCount / $voteTotal * 100) ."%, ".$redDwarfCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Fringe</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($fringeCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($fringeCount / $voteTotal * 100) ."%, ".$fringeCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <br/>
				</div><!--/survey_group-->

				<!--Star Wars Movie-->
				<div class="survey_group">
				    <h3>Favorite Star Wars Movie:</h3>
	            	<h5>Star Wars Episode I: The Phantom Menace</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsICount / $voteTotal * 100) ."%, ".$starWarsICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars Episode II: Attack of the Clones</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsIICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsIICount / $voteTotal * 100) ."%, ".$starWarsIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars Episode III: Revenge of the Sith</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsIIICount/ $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsIIICount / $voteTotal * 100) ."%, ".$starWarsIIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars Episode IV: A New Hope</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsIVCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsIVCount / $voteTotal * 100) ."%, ".$starWarsIVCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars Episode V: The Empire Strikes Back</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsVCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsVCount / $voteTotal * 100) ."%, ".$starWarsVCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Wars Episode VI: Return of the Jedi</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starWarsVICount/ $voteTotal) * 100 ?>%">
				    		<?php echo round($starWarsVICount / $voteTotal * 100) ."%, ".$starWarsVICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				</div><!--/survey_group-->

				<!--Star Trek TV Show-->
				<div class="survey_group">
				    <h3>Favorite Star Trek TV Series:</h3>
	            	<h5>The Original Series</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekTOSCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekTOSCount / $voteTotal * 100) ."%, ".$starTrekTOSCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>The Animated Series</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekTASCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekTASCount / $voteTotal * 100) ."%, ".$starTrekTASCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>The Next Generation</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekTNGCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekTNGCount / $voteTotal * 100) ."%, ".$starTrekTNGCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Deep Space Nine</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekDS9Count / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekDS9Count / $voteTotal * 100) ."%, ".$starTrekDS9Count."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Voyager</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekVGRCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekVGRCount / $voteTotal * 100) ."%, ".$starTrekVGRCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Enterprise</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekENTCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekENTCount / $voteTotal * 100) ."%, ".$starTrekENTCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
			    </div><!--/survey_group-->

			    <!--Star Trek TV Show-->
				<div class="survey_group">
				    <h3>Favorite Star Trek Movie:</h3>
	            	<h5>Star Trek: The Motion Picture</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekICount / $voteTotal * 100) ."%, ".$starTrekICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek II: The Wrath of Khan</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekIICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekIICount / $voteTotal * 100) ."%, ".$starTrekIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek III: The Search for Spock</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekIIICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekIIICount / $voteTotal * 100) ."%, ".$starTrekIIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek IV: The Voyage Home</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekIVCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekIVCount / $voteTotal * 100) ."%, ".$starTrekIVCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek V: The Final Frontier</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekVCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekVCount / $voteTotal * 100) ."%, ".$starTrekVCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek VI: The Undiscovered Country</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekVICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekVICount / $voteTotal * 100) ."%, ".$starTrekVICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek Generations</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekVIICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekVIICount / $voteTotal * 100) ."%, ".$starTrekVIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek: First Contact</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekVIIICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekVIIICount / $voteTotal * 100) ."%, ".$starTrekVIIICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek: Insurrection</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekIXCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekIXCount / $voteTotal * 100) ."%, ".$starTrekIXCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek Nemesis</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekXCount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekXCount / $voteTotal * 100) ."%, ".$starTrekXCount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
				    <h5>Star Trek (J.J.Abrams’ 2009 Reboot)</h5>
	            	<div class="progress progress-info progress-striped" style="margin-bottom: 9px;">
				    	<div class="bar" style="width: <?php echo ($starTrekXICount / $voteTotal) * 100 ?>%">
				    		<?php echo round($starTrekXICount / $voteTotal * 100) ."%, ".$starTrekXICount."/".$voteTotal." votes";?>
				    	</div>
				    </div>
			    </div><!--/survey_group-->

            </div> 

<?php include('modules/footer.php');?>        
    
    </body>
    <script type="text/javascript">
    	$(window).load(function(){
    		$('.total_votes').fadeIn(); 
    	}) 
    </script>
</html>
<?php
	//Set Voted Session and cookie variables at end of page load so that it won't prevent results from displaying the first time
	if(isset($_POST['submitForm'])) {
		//echo "Just voted POST detection<br/>";

		//Set session variable to prevent users from voting twice in a session
		$_SESSION['voted'] = 'true';

		//set cookie to prevent users from voting twice on the same browser
		//setcookie("voted", "true", time()+3600);  // set the cookie
		//echo "cookie voted = ".$_COOKIE['voted'];
	} else {
		//echo "Entered page without posting<br/>";
	}
?>










