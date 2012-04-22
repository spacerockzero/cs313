<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 2</title>

<?php include('modules/header-bottom.php');?>
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=VT323">
  
  <body id="assignment2">   

<?php include('modules/frame-top.php');?>

            <h1 id="fittext3">Assignment 2: PHP Survey</h1>
            <p>
            	Please fill out the form with your current tastes and opinions in Sci-Fi television &amp; movies. 
            	You will see the total results of all votes after submitting your votes.
            </p>
            
            <form id="scifi_form" action="/" method="post">	
		
				<fieldset>
					<legend>Sci-Fi Survey Form</legend>
					<br/>
					<p class="gender">					
						<label for="name">Gender</label>				
						<input type="radio" name="gender" id="gender" value="male"/> Male<br/>
						<input type="radio" name="gender" id="gender" value="female"/> Female<br/>					
					</p>
					<hr/>

					<p class="age">					
						<label for="age">Age</label>	
						<input type="number" min="0" max="120" value="20">			
					</p>
					<hr/>				
					
					<p class="tv_franchise">	

						<label for="tv_franchise">TV Franchise</label>				
						<input type="radio" name="tv_franchise" value="Battlestar Galactica"/> Battlestar Galactica<br/>
						<input type="radio" name="tv_franchise" value="Star Trek"/> Star Trek<br/>	
						<input type="radio" name="tv_franchise" value="Stargate"/> Stargate<br/>
						<input type="radio" name="tv_franchise" value="Star Wars: Clone Wars Animated Series"/> Star Wars: Clone Wars Animated Series<br/>
						<input type="radio" name="tv_franchise" value="Cowboy Bebop"/> Cowboy Bebop<br/>
						<input type="radio" name="tv_franchise" value="Babylon 5"/> Babylon 5<br/>
						<input type="radio" name="tv_franchise" value="Farscape"/> Farscape<br/>
						<input type="radio" name="tv_franchise" value="Red Dwarf"/> Red Dwarf<br/>	
						<input type="radio" name="tv_franchise" value="Fringe"/> Fringe<br/>					
					</p>
					<hr/>

					<p class="submit">
						<button type="submit">Submit Vote</button>
					</p>	
								
				</fieldset>								
			</form>

<?php include('modules/footer.php');?>        
    
    </body>
</html>