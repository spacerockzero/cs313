<?php
    
    //$data = $_POST;
 	$file = 'data/results.txt'; 

 	$id = $_GET['scifi_form'] || $_POST['scifi_form'];

 	$tempArray = json_decode(file_get_contents($file));

 	function process_poll(){

 		for  ($id=>)
 	}



?>
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
            <div id="result">
            	<?php 

            	print "Gender: ".$_POST['gender']."<br/>";
				print "Favorite sci-fi TV franchise: ".$_POST['tv_franchise']."<br/>";
				print "Favorite Star Wars Movie: ".$_POST['star_wars_movie']."<br/>";
				print "Favorite Star Trek TV Show: ".$_POST['star_trek_tv_show']."<br/>";
				print "Favorite Star Trek Movie: ".$_POST['star_trek_movie']."<br/>";

            	?>
            </div> 

<?php include('modules/footer.php');?>        
    
    </body>

</html>







