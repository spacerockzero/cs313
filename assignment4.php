<?php 

  $hostName = '157.201.194.254';
  $userName = 'skabone';
  $password = '';

  if (!($db=mysql_connect($hostName, $userName, $password))) {
    print 'cannot connect msg';
  }
  else
  {
    print 'successful connection<br/>';
  }

  $database = 'skabone';

  if(!(mysql_select_db($database))) {
    //print can't connect
    print 'cannot select db<br/>';
  }



?>
<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 4</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment4">   

<?php include('modules/frame-top.php');?>

            <h1 id="fittext1">Assignment 4</h1>
            <h3>Input SQL query</h3>
            <input type="textfield" value="type SQL query here"></textfield>

            <h3>Results:</h3>
            <p>
              <?php 

                $query = "SELECT * FROM students";

                $result = mysql_query($query);
                  
                if($result == false) 
                { 
                   user_error("Query failed: " . mysql_error() . "<br />\n$query"); 
                } 
                elseif(mysql_num_rows($result) == 0) 
                { 
                   echo "<p>Sorry, no rows were returned by your query.</p>\n"; 
                } 
                else 
                { 
                   while($query_row = mysql_fetch_assoc($result)) 
                   { 
                      foreach($query_row as $key => $value) 
                      { 
                         echo "$key: $value<br />\n"; 
                      } 
                      echo "<br />\n"; 
                   } 
                } ?>
            </p>

<?php include('modules/footer.php');?>        
    
  </body>
</html>