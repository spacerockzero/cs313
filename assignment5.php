<?php
  //Home OSX MAMP / Laptop LAMPP DB setup
  // $hostName = 'localhost';
  // $userName = 'root';
  // $password = '@Nd3r50n15th3b055';

  //Jordan Campus DB Setup
  $hostName = '157.201.194.254';
  $userName = 'skabone';
  $password = '';

  $queryGood = false;
  $addStudent = false;
  $removeStudent = false;

  if (!($db=mysql_connect($hostName, $userName, $password))) {
    print 'cannot connect msg';
  }
  else {
    //print 'successful connection<br/>';
  }

  $database = 'skabone';

  if(!(mysql_select_db($database))) {
    //print can't connect
    print 'cannot select db<br/>';
  }



if (isset($_GET['action'])) {

  //add student routing
  if ($_GET['action'] === 'addStudent') {

    $addStudent = true;

  }

  //edit student routing
  if ($_GET['action'] === 'edit') {

  }

  //remove student routing
  if ($_GET['action'] === 'remove') {
    
    $id = $_GET['id'];

    //Check for verification before deleting student record
    //if ($removeStudent === true){
      //verification check complete, answer is yes
      removeStudent($id);
    //} else {
      //verification check complete/answer is no
    //}
    
  }
}

if (isset($_POST['addStudentSubmit'])) {

  //print "inside POST return";
  //print_r($_POST);
  
  //add student
  if ($_POST['addStudentSubmit']) {
    //print "inside ADD post submit";

    $FirstNameData  = $_POST['FirstName'];
    $LastNameData   = $_POST['LastName'];
    $MajorCodeData  = $_POST['MajorCode'];
    $BirthdateData  = $_POST['Birthdate'];
    $GenderData     = $_POST['Gender'];
    $CityData      = $_POST['City'];
    $StateData      = $_POST['State'];

    //(StudentId, FirstName, LastName, MajorCode, Birthdate, Gender, City, State)

    $addQuery =  "INSERT INTO students 
                 VALUES (NULL, '$FirstNameData', '$LastNameData', '$MajorCodeData', '$BirthdateData', '$GenderData', '$CityData', '$StateData')";

    // $addQuery = "INSERT INTO students 
    //             VALUES (NULL, 'Albin', 'Gustavstrohm', 1001, '1980-06-01', 'M', 'Tacoma', 'WA')";

    $addResult = mysql_query($addQuery);

    if($addResult == false) { 
      user_error("Query failed, yo: " . mysql_error() . "<br />\n$addResult"); 
    }  
    else { 
      //successfully retrieved row results
      //print "successfully added record";
    }

  }
}

function removeStudent($id){
      $removeQuery = "DELETE FROM STUDENTS WHERE StudentId = '$id'";

      $removeResult = mysql_query($removeQuery);

      if($removeResult == false) { 
        user_error("Query failed, yo: " . mysql_error() . "<br />\n$removeResult"); 
      }  
      else { 
        //successfully retrieved row results
        print "successfully removed record";
      }
    }

$query = "SELECT * FROM students ORDER BY StudentId DESC";

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

              <?php 
              //check if add student button is needed
              if($addStudent == false) { ?>
              <a href="?action=addStudent" id="addStudentBtn" class="btn btn-primary btn-large"><strong>+</strong> Add Student</a>
              <?php 
              //print all forms needed
              } else { ?>
              <div id="addStudentDiv" class="cf">

                <form id="addStudent" name="addStudent" action="assignment5.php" method="post">
                  
                  <label for="FirstName"> First Name</label>
                  <input type="text" name="FirstName" id="FirstName" />
                  
                  <label for="LastName"> Last Name</label>
                  <input type="text" name="LastName" id="LastName" />

                  <br/>
                  <label for="MajorCode"> MajorCode</label>
                  <select name="MajorCode" id="MajorCode">
                    <option value="1001">1001 (B.S. in Biology)</option>
                    <option value="1002">1002 (B.S. in Psychology)</option>
                    <option value="1003">1003 (B.S. in Architecture)</option>
                    <option value="1004">1004 (B.S. in Computer Science)</option>
                    <option value="1005">1005 (B.S. in Mechanical Engineering)</option>
                    <option value="1006">1006 (B.S. in Automotive Technology)</option>
                    <option value="1007">1007 (B.S. in Computer Information Technology)</option>
                    <option value="1008">1008 (B.S. in Business Management)</option>
                    <option value="1009">1009 (B.S. in Art)</option>
                    <option value="1010">1010 (B.S. in Interior Design)</option>
                  </select>

                  <label for="Birthdate"> Birthdate</label>
                  <input name="Birthdate" type="text" class="span2" id="dp2" value="1985-01-01">


                  <br/>
                  <label for="Gender"> Gender</label>
                  <select name="Gender" id="Gender">
                    <option value="M">M</option>
                    <option value="F">F</option>
                  </select>

                  <br/>
                  <label for="City"> City</label>
                  <input type="text" name="City" id="City" />

                  <label for="State"> State</label>
                  <input type="text" name="State" id="State" />
                  <br/>
                  <br/>
                  <a id="addStudentCancel" name="addStudentCancel" href="assignment5.php" class="btn btn-danger btn-large" type="button" >Cancel</a>
                  <input id="addStudentSubmit" name="addStudentSubmit" class="btn btn-primary btn-large" type="submit" value="+ Add New Student" >


                </form>
              </div>

              <?php } ?>
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
    <script type="text/javascript" src="js/libs/jquery-ui-1.8.20.custom.min.js"></script>
    <script type="text/javascript">
      
      $(function(){
        $('#dp2').datepicker({
            dateFormat : 'yy-mm-dd'
        });
        $('#addStudentDiv').slideDown();
      });
  
    </script>
  </body>
</html>
