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
  $editStudent = false;
  $removeStudent = false;
  //global $student;
  //$student;
  $errors = array();
  $messages = array();

  if (!($db=mysql_connect($hostName, $userName, $password))) {
    $errors['connect_db_error'] = 'cannot connect msg';
  }
  else {
    //print 'successful connection<br/>';
  }

  $database = 'skabone';

  if(!(mysql_select_db($database))) {
    //print can't connect
    $errors['select_db_error'] = 'cannot select db<br/>';
  }



if (isset($_GET['action'])) {

  //add student routing
  if ($_GET['action'] === 'addStudent') {

    $addStudent = true;

  }

  //edit student routing
  if ($_GET['action'] === 'edit') {
    $id = $_GET['id'];
    // print "inside edit student";
    // print "<br/>id = ".$id;
    $editStudent = true;
    selectStudent($id);
  }

  //remove student routing
  if ($_GET['action'] === 'remove') {
    
    $id = $_GET['id'];

    //Check for verification before deleting student record
    if ($removeStudent === true){
      //verification check complete, answer is yes
      removeStudent($id);
    } else {
      //verification check complete/answer is no
      $removeStudent = true;
    }
    
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

    $addResult = mysql_query($addQuery);

    if($addResult == false) { 
      user_error("Query failed, yo: " . mysql_error() . "<br />\n$addResult"); 
    }  
    else { 
      //successfully retrieved row results
      print "successfully added record";
    }

  }
}

if (isset($_POST['editStudentSubmit'])) {

  //print "inside POST return";
  //print_r($_POST);
  
  //add student
  if ($_POST['editStudentSubmit']) {
    //print "inside ADD post submit";

    $id             = $_POST['StudentId'];
    $FirstName  = $_POST['FirstName'];
    $LastName   = $_POST['LastName'];
    $MajorCode  = $_POST['MajorCode'];
    $Birthdate  = $_POST['Birthdate'];
    $Gender     = $_POST['Gender'];
    $City      = $_POST['City'];
    $State      = $_POST['State'];

    //(StudentId, FirstName, LastName, MajorCode, Birthdate, Gender, City, State)

    $editQuery =   "UPDATE students
                    SET FirstName='$FirstName', LastName='$LastName', MajorCode='$MajorCode', Birthdate='$Birthdate', Gender='$Gender', City='$City', State='$State'
                    WHERE StudentID = '$id'";


                    // "UPDATE students
                    // SET FirstName='$FirstName', LastName='$LastName, MajorCode='$MajorCode', Birthdate='$Birthdate', Gender='$Gender', City='$City', State='$State'
                    // WHERE StudentID = '$id'";

                // "INSERT INTO students 
                //  VALUES (NULL, '$FirstName', '$LastName', '$MajorCode', '$Birthdate', '$Gender', '$City', '$State')
                //  WHERE StudentID = '$id'";

    $editResult = mysql_query($editQuery);

    if($editResult == false) { 
      user_error("Query failed, yo: " . mysql_error() . "<br />\n$editResult"); 
    }  
    else { 
      //successfully retrieved row results
      print "successfully modified record";
    }

  }
}

function removeStudent($id){
  $removeQuery = "DELETE FROM students WHERE StudentId = '$id'";

  $removeResult = mysql_query($removeQuery);

  if($removeResult == false) { 
    user_error("Query failed, yo: " . mysql_error() . "<br />\n$removeResult"); 
  }  
  else { 
    //successfully retrieved row results
    print "successfully removed record";
  }
}

function selectStudent($id){

  $selectQuery = "SELECT * FROM students where StudentId = '$id'";

  $selectResult = mysql_query($selectQuery);
    
  if($selectResult == false) { 
     user_error("Query failed: " . mysql_error() . "<br />\n$selectQuery"); 
  } 
  elseif(mysql_num_rows($selectResult) == 0) { 
     echo "<p>Sorry, no rows were returned by your query.</p>\n"; 
  } 
  else { 
    //successfully retrieved row results
    
    //print "<br />\n Successfully selected student with id = ".$id;
    
    // while ($row = mysql_fetch_assoc($result)) {
    //     echo $row['FirstName'];
    //     echo $row['LastName'];
    //     echo $row['MajorCode'];
    //     echo $row['Birthdate'];
    //     echo $row['Gender'];
    //     echo $row['City'];
    //     echo $row['State'];
    // }
    global $student;
    $student = mysql_fetch_assoc($selectResult);
    
    // print_r($student);

    // echo "<br/>\nFirstName = ".$student['FirstName']."<br/>\n";
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
              if($addStudent == false && $editStudent == false) { ?>
              <a href="?action=addStudent" id="addStudentBtn" class="btn btn-primary btn-large"><strong>+</strong> Add Student</a>
              <?php 
              //print all forms needed
              } if ($addStudent == true){ ?>
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

              <?php } if ( $editStudent == true ){ ?>
              <div id="addStudentDiv" class="cf">
                <h3>Edit Student</h3>
                <form id="editStudent" name="editStudent" action="assignment5.php" method="post">
                  
                  <label for="StudentId"> StudentId</label>
                  <input type="text" name="StudentId" id="StudentId" value="<?php echo $student['StudentId']; ?>" readonly="readonly"/><br/>

                  <label for="FirstName"> First Name</label>
                  <input type="text" name="FirstName" id="FirstName" value="<?php echo $student['FirstName']; ?>"/>
                  
                  <label for="LastName"> Last Name</label>
                  <input type="text" name="LastName" id="LastName"  value="<?php echo $student['LastName']; ?>"/>

                  <br/>
                  <label for="MajorCode"> MajorCode</label>
                  <select name="MajorCode" id="MajorCode" >
                    <option value="1001" <?php if ($student['MajorCode'] == 1001) {echo "selected='selected'";} ?>>1001 (B.S. in Biology)</option>
                    <option value="1002" <?php if ($student['MajorCode'] == 1002) {echo "selected='selected'";} ?>>1002 (B.S. in Psychology)</option>
                    <option value="1003" <?php if ($student['MajorCode'] == 1003) {echo "selected='selected'";} ?>>1003 (B.S. in Architecture)</option>
                    <option value="1004" <?php if ($student['MajorCode'] == 1004) {echo "selected='selected'";} ?>>1004 (B.S. in Computer Science)</option>
                    <option value="1005" <?php if ($student['MajorCode'] == 1005) {echo "selected='selected'";} ?>>1005 (B.S. in Mechanical Engineering)</option>
                    <option value="1006" <?php if ($student['MajorCode'] == 1006) {echo "selected='selected'";} ?>>1006 (B.S. in Automotive Technology)</option>
                    <option value="1007" <?php if ($student['MajorCode'] == 1007) {echo "selected='selected'";} ?>>1007 (B.S. in Computer Information Technology)</option>
                    <option value="1008" <?php if ($student['MajorCode'] == 1008) {echo "selected='selected'";} ?>>1008 (B.S. in Business Management)</option>
                    <option value="1009" <?php if ($student['MajorCode'] == 1009) {echo "selected='selected'";} ?>>1009 (B.S. in Art)</option>
                    <option value="1010" <?php if ($student['MajorCode'] == 1010) {echo "selected='selected'";} ?>>1010 (B.S. in Interior Design)</option>
                  </select>

                  <label for="Birthdate"> Birthdate</label>
                  <input name="Birthdate" type="text" class="span2" id="dp2" value="<?php echo $student['Birthdate']; ?>">


                  <br/>
                  <label for="Gender"> Gender</label>
                  <select name="Gender" id="Gender">
                    <option value="M" <?php if ($student['Gender'] == 'M') {echo "selected='selected'";} ?>>M</option>
                    <option value="F" <?php if ($student['Gender'] == 'F') {echo "selected='selected'";} ?>>F</option>
                  </select>

                  <br/>
                  <label for="City"> City</label>
                  <input type="text" name="City" id="City" value="<?php echo $student['City']; ?>"/>

                  <label for="State"> State</label>
                  <input type="text" name="State" id="State" value="<?php echo $student['State']; ?>"/>
                  <br/>
                  <br/>
                  <a id="editStudentCancel" name="editStudentCancel" href="assignment5.php" class="btn btn-danger btn-large" type="button" >Cancel</a>
                  <input id="editStudentSubmit" name="editStudentSubmit" class="btn btn-primary btn-large" type="submit" value="Submit Changes" >

                </form>
              </div>
              <?php } if ($removeStudent == true){ ?>
                <div id="addStudentDiv" class="cf">
                  <h3>Edit Student</h3>
                  <form id="removeStudent" name="removeStudent" action="assignment5.php" method="post">
                    <p>Are you sure you want to remove student "<?php echo $student['FirstName'].' '.$student['LastName']; ?>"?</p>
                    <a id="editStudentCancel" name="editStudentCancel" href="assignment5.php" class="btn btn-danger btn-large" type="button" >Cancel</a>
                    <input type="submit" class="btn btn-primary btn-large" value="Remove Student"/>
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
