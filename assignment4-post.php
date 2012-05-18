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
  }
  
?>