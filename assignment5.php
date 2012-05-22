<?php
if (isset($_GET['action'])) {
  print "inside get action return";

  //add student
  if ($_GET['action'] === 'addStudent') {
    print "inside ADD";
  }
  //edit student
  if ($_GET['action'] === 'edit') {
    print "inside EDIT";
  }
  //remove student
  if ($_GET['action'] === 'remove') {
    print "inside REMOVE";
  }
}

//Jordan Campus DB Setup
// $hostName = '157.201.194.254';
// $userName = 'skabone';
// $password = '';

//Home OSX MAMP DB setup
$hostName = 'localhost';
$userName = 'root';
$password = '@Nd3r50n15th3b055';

$queryGood = false;

if (!($db=mysql_connect($hostName, $userName, $password))) {
  print 'cannot connect msg';
}
else
{
  //print 'successful connection<br/>';
}

$database = 'skabone';

if(!(mysql_select_db($database))) {
  //print can't connect
  print 'cannot select db<br/>';
}


$query = "SELECT * FROM students";

$result = mysql_query($query);
  
if($result == false) { 
   user_error("Query failed: " . mysql_error() . "<br />\n$query"); 
} 
elseif(mysql_num_rows($result) == 0) { 
   echo "<p>Sorry, no rows were returned by your query.</p>\n"; 
} 
else { 
  //successfully retrieved row results
  $queryGood = true;
}

?>

<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 5</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment5">   

<?php include('modules/frame-top.php');?>
          <div class="cf">
            <h1>Assignment 5: DB Modification</h1>
            <br/>
            <div id="students_table">
              
              <a href="?action=addStudent" class="btn btn-primary btn-large"><strong>+</strong> Add Student</a>

              <h3>Students</h3>

              <?php 
              if ($queryGood == true){
                  //write table header
                  ?>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <?php 
                          
                          $i = 0;
                          
                          while ($i < mysql_num_fields($result)) {
                              
                              $meta = mysql_fetch_field($result, $i);
                              
                              if (!$meta) {
                                  echo "No information available<br />\n";
                              }
                              
                              echo "<th>".$meta->name."</th>";
                              
                              $i++;
                          }

                        ?>  
                              <th>Edit</th>
                            </tr>
                          </thead>
                          <tbody>

                        <?php
                        //print table row values
                              
                          while($query_row = mysql_fetch_assoc($result)) 
                          { 
                            ?>
                            <tr>
                            <?php
                            $studentID;
                            foreach($query_row as $key => $value) 
                            { 
                               echo "<td>$value</td>"; 
                               if ($key == 'StudentId') {
                                $studentID = $value;
                               }
                            } 
                            ?>
                            <td class="edit_col">
                              <a href='?action=edit&id=<?php echo $studentID;?>'>
                                <img src='img/edit.png' alt='Edit this entry'/>
                              </a>
                              <a href='?action=remove&id=<?php echo $studentID;?>'>
                                <img src='img/remove.png' alt='Remove this entry'/>
                              </a>
                            </td>
                          </tr>
                            <?php
                          } 
                        

                        //close table
                        ?>
                          </tbody>
                        </table>
                        <?php 
                      } else {
                        print "query failed, table not written";
                      }

                    ?>

            </div>
          </div>

<?php include('modules/footer.php');?>        
    
  </body>
</html>
