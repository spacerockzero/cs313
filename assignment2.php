<?php
    // switch ($_REQUEST['action']) {
    // case 'write':
    //     file_put_contents('scifi_results.json', json_encode($_POST['scifi_form']));
    //     break;
    // case 'read':
    //     $data = unserialize(file_get_contents('scifi_results.json'));
    //     echo json_encode($data);
    //     break;
//}
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
            <div id="result"></div> 
            <form name="scifi_form" id="scifi_form" action="phplib/post.php" method="post">	
		
				<fieldset>
					<legend>Sci-Fi Survey Form</legend>
					<hr/>
					
					<p class="gender radio_list">					
						<label for="name">Gender</label>				
						<input type="radio" name="gender" id="gender" value="male"/><span>Male</span><br/>
						<input type="radio" name="gender" id="gender" value="female" checked="true"/><span>Female</span><br/>					
					</p>
					<hr/>

					<p class="age">					
						<label for="age">Age</label>	
						<input type="number" min="0" max="120" value="20">			
					</p>
					<hr/>				
					
					<p class="tv_franchise radio_list">	

						<label for="tv_franchise">Favorite sci-fi TV Franchise</label>				
						<input type="radio" name="tv_franchise" value="Battlestar Galactica"/><span>Battlestar Galactica</span><br/>
						<input type="radio" name="tv_franchise" value="Star Trek" checked="true"/><span>Star Trek</span><br/>	
						<input type="radio" name="tv_franchise" value="Stargate"/><span>Stargate</span><br/>
						<input type="radio" name="tv_franchise" value="Star Wars: Clone Wars Animated Series"/><span>Star Wars: Clone Wars Animated Series</span><br/>
						<input type="radio" name="tv_franchise" value="Cowboy Bebop"/><span>Cowboy Bebop</span><br/>
						<input type="radio" name="tv_franchise" value="Babylon 5"/><span>Babylon 5</span><br/>
						<input type="radio" name="tv_franchise" value="Farscape"/><span>Farscape</span><br/>
						<input type="radio" name="tv_franchise" value="Red Dwarf"/><span>Red Dwarf</span><br/>	
						<input type="radio" name="tv_franchise" value="Fringe"/><span>Fringe</span><br/>					
					</p>
					<hr/>

					<p class="star_wars_movie radio_list">	
						<label for="star_wars_movie">Favorite Star Wars movie</label>				
						<input type="radio" name="star_wars_movie" value="Star Wars Episode I: The Phantom Menace"/><span>Star Wars Episode I: The Phantom Menace</span><br/>
						<input type="radio" name="star_wars_movie" value="Star Wars Episode II: Attack of the Clones"/><span>Star Wars Episode II: Attack of the Clones</span><br/>	
						<input type="radio" name="star_wars_movie" value="Star Wars Episode III: Revenge of the Sith"/><span>Star Wars Episode III: Revenge of the Sith</span><br/>
						<input type="radio" name="star_wars_movie" value="Star Wars Episode IV: A New Hope"/><span>Star Wars Episode IV: A New Hope</span><br/>
						<input type="radio" name="star_wars_movie" value="Star Wars Episode V: The Empire Strikes Back" checked="true"/><span>Star Wars Episode V: The Empire Strikes Back</span><br/>
						<input type="radio" name="star_wars_movie" value="Star Wars Episode VI: Return of the Jedi"/><span>Star Wars Episode VI: Return of the Jedi</span><br/>				
					</p>
					<hr/>

					<p class="star_trek_tv_show radio_list">	
						<label for="star_trek_tv_show">Favorite Star Trek TV Show</label>				
						<input type="radio" name="star_trek_tv_show" value="The Original Series"/><span>The Original Series</span><br/>
						<input type="radio" name="star_trek_tv_show" value="The Animated Series"/><span>The Animated Series</span><br/>	
						<input type="radio" name="star_trek_tv_show" value="The Next Generation" checked="true"/><span>The Next Generation</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Deep Space Nine"/><span>Deep Space Nine</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Voyager"/><span>Voyager</span><br/>
						<input type="radio" name="star_trek_tv_show" value="Enterprise"/><span>Enterprise</span><br/>				
					</p>
					<hr/>

					<p class="star_trek_movie radio_list">	
						<label for="star_trek_movie">Favorite Star Trek Movie</label>				
						<input type="radio" name="star_trek_movie" value="Star Trek: The Motion Picture"/><span>Star Trek: The Motion Picture</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek II: The Wrath of Khan"/><span>Star Trek II: The Wrath of Khan</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star Trek III: The Search for Spock"/><span>Star Trek III: The Search for Spock</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek IV: The Voyage Home"/><span>Star Trek IV: The Voyage Home</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek V: The Final Frontier"/><span>Star Trek V: The Final Frontier</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek VI: The Undiscovered Country"/><span>Star Trek VI: The Undiscovered Country</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star Trek Generations"/><span>Star Trek Generations</span><br/>	
						<input type="radio" name="star_trek_movie" value="Star Trek: First Contact"/><span>Star Trek: First Contact</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek: Insurrection"/><span>Star Trek: Insurrection</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek Nemesis"/><span>Star Trek Nemesis</span><br/>
						<input type="radio" name="star_trek_movie" value="Star Trek (J.J.Abrams’ 2009 Reboot)" checked="true"/><span>Star Trek (J.J.Abrams’ 2009 Reboot)</span><br/>				
					</p>
					<hr/>

					<p class="submit">
						<input id="submit" name="submitForm" class="btn btn-primary btn-large" type="submit" value="Submit Form" onsubmit="ajaxFunction();">
					</p>					
								
				</fieldset>								
			</form>

<?php include('modules/footer.php');?>        
    
    </body>
    <script type="text/javascript">

  //   	$.fn.serializeObject = function()
		// {
		//     var o = {};
		//     var a = this.serializeArray();
		//     $.each(a, function() {
		//         if (o[this.name] !== undefined) {
		//             if (!o[this.name].push) {
		//                 o[this.name] = [o[this.name]];
		//             }
		//             o[this.name].push(this.value || '');
		//         } else {
		//             o[this.name] = this.value || '';
		//         }
		//     });
		//     return o;
		// };
		
		// var jsonObject = $('#scifi_form').serializeObject();
		
		// $(document).ready(function(){
		// 	$('#result').append("JSON obect is " + JSON.stringify(jsonObject));
		// });

  //   	$(document).ready(function(){  

	 //    	// Assign handlers immediately after making the request,
		// 	// and remember the jqxhr object for this request
		// 	var jqxhr = $.ajax( "phplib/post.php" )
		// 	    .done(function() { alert("success"); })
		// 	    .fail(function() { alert("error"); })
		// 	    .always(function() { alert("complete"); });

		// 	// perform other work here ...

		// 	// Set another completion function for the request above
		// 	jqxhr.always(function() { alert("second complete"); });

		// });

    	

		//$('#scifi_form').submit(function() {
	         //var jsonObject = $('#scifi_form').serializeObject();

			// // some jQuery to write to file
		 //    var jqxhr = $.ajax({
		 //        type : "post",
		 //        url : "phplib/post.php",
		 //        dataType : 'json',
		 //        data : {
		 //            json : jsonObject
		 //        }
		 //    })
		 //    .success(function() {alert("success!")})
		 //    .done(function() { alert("done-success"); })
			// .fail(function() { alert("error-fail"); })
			// .always(function() { alert("complete"); });	
			
	    //});

		// $(function() {  
		//   $("#submit").click(function() {  
		//     // validate and process form here  
		//     var jsonObject = JSON.stringify($('#scifi_form').serializeObject());

		// 	$.ajax({  
		// 	  type: "POST",  
		// 	  url: "phplib/post.php",  
		// 	  data: jsonObject,  
		// 	  success: function() {  
		// 	    $('#results').append("<div>JSON object submitted successfully</div>");  
		// 	  }  
		// 	});  
		// 	return false; 
		//   });  
		// }); 
		// $(function() {

		// 	var jsonObject = JSON.stringify($('#scifi_form').serializeObject());

		// 	$.ajax({  
		// 	  type: "POST",  
		// 	  url: "phplib/post.php",  
		// 	  data: jsonObject,  
		// 	  success: function() {  
		// 	    $('#results').append("<div>JSON object submitted successfully</div>");  
		// 	  }  
		// 	});  
		// 	return false; 

		// });

		<!-- 
		//Browser Support Code
		// function ajaxFunction(){
		// 	var ajaxRequest;  // The variable that makes Ajax possible!
			
		// 	try{
		// 		// Opera 8.0+, Firefox, Safari
		// 		ajaxRequest = new XMLHttpRequest();
		// 	} catch (e){
		// 		// Internet Explorer Browsers
		// 		try{
		// 			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		// 		} catch (e) {
		// 			try{
		// 				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
		// 			} catch (e){
		// 				// Something went wrong
		// 				alert("Your browser broke!");
		// 				return false;
		// 			}
		// 		}
		// 	}
		// 	// Create a function that will receive data sent from the server
		// 	ajaxRequest.onreadystatechange = function(){
		// 		if(ajaxRequest.readyState == 4){
		// 			JSON.stringify(jsonObject) = ajaxRequest.responseText;
		// 		}
		// 	}
		// 	ajaxRequest.open("GET", "phplib/post.php", true);
		// 	ajaxRequest.send(null); 
		// 	$('#result').append("JSON obect is " + JSON.stringify(jsonObject));
		// }

		//-->
		    


    </script>


</html>







