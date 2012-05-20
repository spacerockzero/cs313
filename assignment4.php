<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 4</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment4">   

<?php include('modules/frame-top.php');?>

            <h1>Assignment 4</h1>
            <h3>Input SQL query</h3>
            [please use single quotes]<br/>
            <form id="query_form" name="query_form" action="" method="POST">
              <input type="textfield" name="query" id="query_field" value="SELECT * FROM students"></textfield>
              <input type="submit" id="submit" value="submit query" />
            </form>
            
            <h3>Results:</h3>
            <p id="result"></p>

<?php include('modules/footer.php');?>   
    
    <script type="text/javascript">
        
        //run ajax function on form submit
        $('#query_form').submit(function() {
          
          //run my ajax wrapper method
          ajax_query();

          //keep form from submitting normally
          return false;
        });

        function ajax_query(){

          //get value of text field
          txt=$("#query_field").val();

          //run jQuery ajax method 
          $.post("phplib/assignment4-post.php",{query:txt},function(result){
            //print ajax result in the result area
            $("#result").html(result);
          });
        }

    </script>
  </body>
</html>