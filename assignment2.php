<?php
	
	// this starts the session 
 	session_start();
 	// if (isset($_COOKIE)){print "cookie = ".$_COOKIE['voted']."<br/>";}
 	// if (isset($_SESSION)){print "session = ".$_SESSION['voted']."<br/>";}
 	//print print_r($_SESSION)."<br/>";
 	global $voted;

	if (isset($_SESSION['voted']) || (isset($_COOKIE['voted']))) {
		//echo "Already voted";
		$voted = $_SESSION['voted'];
	} else {
		//echo "Haven't voted yet";
	}
	//print isset($_SESSION['voted'])." after cookie detect<br/>";
?>
<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 2</title>

<?php include('modules/header-bottom.php');?>
  
  <body id="assignment2">   

<?php include('modules/frame-top.php');?>
          <div class="cf hero-unit">
            <h1>Assignment 2: PHP Survey</h1>
            <?php if($voted != 'true') {?>
            <p>
            	Please fill out the form with your current tastes and opinions in Sci-Fi television &amp; movies. 
            	You will see the total results of all votes after submitting your votes.
            </p>
            <div id="result"></div> 
            <form name="scifi_form" id="scifi_form" action="assignment2-post.php" method="post" accept-charset="utf-8">	
		
				<fieldset>
					<legend>Sci-Fi Survey Form</legend>
					<hr/>
					<div class="survey_group">
					<p class="gender radio_list">					
						<label for="name">Gender</label>				
						<input type="radio" name="gender" id="gender" value="male" data-bvalidator="required" data-bvalidator-msg="Select a gender"/><span>Male</span><br/>
						<input type="radio" name="gender" id="gender" value="female"/><span>Female</span><br/>					
					</p>
					</div><!--/survey_group-->

					<div class="survey_group">
					<p class="tv_franchise radio_list">	

						<label for="tv_franchise">Favorite sci-fi TV Franchise</label>				
						<input type="radio" name="tv_franchise" value="Battlestar_Galactica" data-bvalidator="required" data-bvalidator-msg="Select a TV franchise"/><span>Battlestar Galactica</span><br/>
						<input type="radio" name="tv_franchise" value="Star_Trek"/><span>Star Trek</span><br/>	
						<input type="radio" name="tv_franchise" value="Stargate"/><span>Stargate</span><br/>
						<input type="radio" name="tv_franchise" value="Star_Wars:_Clone_Wars_Animated_Series"/><span>Star Wars: Clone Wars Animated Series</span><br/>
						<input type="radio" name="tv_franchise" value="Cowboy_Bebop"/><span>Cowboy Bebop</span><br/>
						<input type="radio" name="tv_franchise" value="Babylon_5"/><span>Babylon 5</span><br/>
						<input type="radio" name="tv_franchise" value="Farscape"/><span>Farscape</span><br/>
						<input type="radio" name="tv_franchise" value="Red_Dwarf"/><span>Red Dwarf</span><br/>	
						<input type="radio" name="tv_franchise" value="Fringe"/><span>Fringe</span><br/>					
					</p>
					</div><!--/survey_group-->
					<hr class="cf"/>

					<div class="survey_group">
					<p class="star_wars_movie radio_list">	
						<label for="star_wars_movie">Favorite Star Wars movie</label>				
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_I:_The_Phantom_Menace" data-bvalidator="required" data-bvalidator-msg="Select a Star Wars movie"/><span>Star Wars Episode I: The Phantom Menace</span><br/>
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_II:_Attack_of_the_Clones"/><span>Star Wars Episode II: Attack of the Clones</span><br/>	
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_III:_Revenge_of_the_Sith"/><span>Star Wars Episode III: Revenge of the Sith</span><br/>
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_IV:_A_New_Hope"/><span>Star Wars Episode IV: A New Hope</span><br/>
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_V:_The_Empire_Strikes_Back"/><span>Star Wars Episode V: The Empire Strikes Back</span><br/>
						<input type="radio" name="star_wars_movie" value="Star_Wars_Episode_VI:_Return_of_the_Jedi"/><span>Star Wars Episode VI: Return of the Jedi</span><br/>				
					</p>
					</div><!--/survey_group-->

					<div class="survey_group">
					<p class="star_trek_tv_show radio_list">	
						<label for="star_trek_tv_show">Favorite Star Trek TV Show</label>				
						<input type="radio" name="star_trek_tv_show" value="The_Original_Series" data-bvalidator="required" data-bvalidator-msg="Select a Star Trek TV show"/><span>The Original Series</span><br/>
						<input type="radio" name="star_trek_tv_show" value="The_Animated_Series"/><span>The Animated Series</span><br/>	
						<input type="radio" name="star_trek_tv_show" value="The_Next_Generation"/><span>The Next Generation</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Deep_Space_Nine"/><span>Deep Space Nine</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Voyager"/><span>Voyager</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Enterprise"/><span>Enterprise</span><br/>				
					</p>
					</div><!--/survey_group-->
					<hr class="cf"/>

					<div class="survey_group">
					<p class="star_trek_movie radio_list">	
						<label for="star_trek_movie">Favorite Star Trek Movie</label>				
						<input type="radio" name="star_trek_movie" value="Star_Trek:_The_Motion_Picture" data-bvalidator="required" data-bvalidator-msg="Select a Star Trek Movie"/><span>Star Trek: The Motion Picture</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_II:_The_Wrath_of_Khan"/><span>Star Trek II: The Wrath of Khan</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star_Trek_III:_The_Search_for_Spock"/><span>Star Trek III: The Search for Spock</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_IV:_The_Voyage_Home"/><span>Star Trek IV: The Voyage Home</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_V:_The_Final_Frontier"/><span>Star Trek V: The Final Frontier</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_VI:_The_Undiscovered_Country"/><span>Star Trek VI: The Undiscovered Country</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star_Trek_Generations"/><span>Star Trek Generations</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star_Trek:_First_Contact"/><span>Star Trek: First Contact</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek:_Insurrection"/><span>Star Trek: Insurrection</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_Nemesis"/><span>Star Trek Nemesis</span><br/>
						<input type="radio" name="star_trek_movie" value="Star_Trek_(J.J.Abrams_2009_Reboot)"/><span>Star Trek (J.J.Abrams’ 2009 Reboot)</span><br/>				
					</p>
					</div><!--/survey_group-->
					<hr class="cf"/>


					<p class="submit">
						<input id="submit" name="submitForm" class="btn btn-primary btn-large" type="submit" value="Submit Form" >
					</p> 					
								
				</fieldset>								
			</form>

		<?php } else { ?>
			<p>
            	You have already voted. <a href="assignment2-post.php">See survey results</a>
            </p>
		<?php } ?>
          </div>
<?php include('modules/footer.php');?>        
    
    </body>
    <script type="text/javascript" src="js/libs/jquery.bvalidator-yc.js"/>
    <script type="text/javascript">
		$(document).ready(function () {
			$('#scifi_form').bValidator();
		});
    </script>


</html>







