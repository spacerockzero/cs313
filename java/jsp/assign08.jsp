<%@page language="java" import="java.sql.*" %>
<%
  String DRIVER = "org.gjt.mm.mysql.Driver";
  Class.forName(DRIVER).newInstance();


  Connection con=null;
  ResultSet rst=null;
  Statement stmt=null;

  try{
    String url="jdbc:mysql://jordan/skabone?user=skabone&password=";

    int i=1;
    con=DriverManager.getConnection(url);
    stmt=con.createStatement();
    
    rst.close();
    stmt.close();
    con.close();
  }catch(Exception e){
    System.out.println(e.getMessage());
  }

//select all students
  String studentID = "0";
  String studentName = "BLORG!!!";
//select one student's current classes

//add a class for one student
%>
<%
//remove a class for one student
  if (request.getParameter("drop") != null) {
    if (!(request.getParameter("drop").equals(""))) {
      //String dropStudentID = request.getParameter("studentID");
      String regClassID = request.getParameter("regClassID");
      %>regClassID = <%=regClassID%>
%>
<%      
      try{
        String url="jdbc:mysql://jordan/skabone?user=skabone&password=";
        int i=1;
        con=DriverManager.getConnection(url);
        stmt=con.createStatement();

        String query = "DELETE from registeredcourses where ID = " + regClassID + "";
        int delete=stmt.executeUpdate(query);
        if(delete == 1){
          %><script>alert("Row is deleted!");</script><%
          //System.out.println("Row is deleted.");
        } else {
          %><script>alert("Row is not deleted!");</script><%
          //System.out.println("Row is not deleted.");
        }
        //delete.close();
        stmt.close();
        con.close();
      }catch(Exception e){
        System.out.println(e.getMessage());
      }

    }
  }
%>

<!doctype html>
<!--[if lt IE 7]> 
<html class="no-js ie6 oldie" lang="en"> 
<![endif]-->
<!--[if IE 7]>    
<html class="no-js ie7 oldie" lang="en"> 
<![endif]-->
<!--[if IE 8]>    
<html class="no-js ie8 oldie" lang="en"> 
<![endif]-->
<!--[if IE 9 ]>    
<html lang="en" class="no-js ie9"> 
<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js" > <!--<![endif]-->
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="This is a site for Jakob Anderson's CS313 class projects and assignments"/>
    <meta name="author" content="Jakob Anderson"/>
    <!-- IE Edge content value below throws a validation error, but it has been classified as a non-issue -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 7 JSP</title>
    <link href="http://localhost:1024/~skabone/css/custom.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
    <script src="http://localhost:1024/~skabone/js/libs/modernizr.js" type="text/javascript"></script>
  </head>
  <body id="assignment8">   
    <div class="navbar">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">Jakob Anderson | CS313</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="index.html">Home</a></li>
              <li><a href="http://www.jakobanderson.com/about-me/">About</a></li>
              <li><a href="http://www.jakobanderson.com">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3 leftnav">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Pages</li>
              <li class="pg_home"><a href="http://localhost:1024/~skabone/index.php">Home</a></li>
              <li class="pg_assignments"><a href="http://localhost:1024/~skabone/assignments.php">Assignment Page</a></li>

              <li class="nav-header">Assignments</li>
              <li class="pg_assignment2"><a href="http://localhost:1024/~skabone/assignment2.php">Assignment 2</a></li>
              <li class="pg_assignment3"><a href="http://localhost:1024/~skabone/assignment3.php">Assignment 3</a></li>
              <li class="pg_assignment4"><a href="http://localhost:1024/~skabone/assignment4.php">Assignment 4</a></li>
              <li class="pg_assignment5"><a href="http://localhost:1024/~skabone/assignment5.php">Assignment 5</a></li>
              <li class="pg_assignment6"><a href="http://localhost:1024/~skabone/assignment6.php">Assignment 6</a></li>
              <li class="pg_assignment7"><a href="http://localhost:1024/~skabone/assignment7.php">Assignment 7</a></li>
              <li class="pg_assignment8"><a href="http://localhost:1024/~skabone/assignment8.php">Assignment 8</a></li>
              <li class="pg_assignment9"><a href="http://localhost:1024/~skabone/assignment9.php">Assignment 9</a></li>
              <li class="pg_assignment10"><a href="http://localhost:1024/~skabone/assignment10.php">Assignment 10</a></li>            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9 mainhero">
          <div class="cf">
            <h1>Assignment 8</h1>

            <h3>Class registration</h3>

            <!-- select a user -->
            <form name="select_student_form" id="post" action="assign08.jsp" method="POST">
              <label for="student">Select a students to register classes for</label>
              <select name="student" id="student">
                <%
                //print out list of students from db to select from
                try{
                  rst=stmt.executeQuery("select * from students");
                  while(rst.next()){ 
                  %>
                    <option value="<%=rst.getString(1)%>"><%=rst.getString(2)%> <%=rst.getString(3)%></option>
                  <%
                  }
                  rst.close();
                  stmt.close();
                  con.close();
                }catch(Exception e){
                  System.out.println(e.getMessage());
                }
                %>
                <!-- <option value="1">Albin Gustavstrohm</option>
                <option value="2">Alvar Haakonsen</option>
                <option value="3">Anders Halldorsson</option>
                <option value="4">Annika Hedvigsen</option>
                <option value="5">Asbjorn Hegeson</option>
                <option value="6">Astrid Helgagren</option>
                <option value="7">Axel Hemmingsson</option>
                <option value="8">Beata Henrikssen</option>
                <option value="9">Bergljot Henrikeson</option>
                <option value="10">Bernhardt Heinrichtssen</option> -->
              </select>
              <input name="select_student" type="submit" value="Select Student" class="btn btn-primary btn-large"/>
            </form>
            <%  if (request.getParameter("student") != null && request.getParameter("student") != null) {
                  if (!(request.getParameter("student").equals("")) && !(request.getParameter("student").equals(""))) {
                  studentID = request.getParameter("student");
                    %>
                      <% 
                      //print out list of classes this student has taken
                      try{
                        String url="jdbc:mysql://jordan/skabone?user=skabone&password=";
                        int i=1;
                        con=DriverManager.getConnection(url);
                        stmt=con.createStatement();

                        String query = "select * from students where StudentID = " + studentID + "";
                        rst=stmt.executeQuery(query);
                        while(rst.next()){ 
                          studentName = rst.getString(2) + " " + rst.getString(3);
                        }
                        rst.close();
                        stmt.close();
                        con.close();
                      }catch(Exception e){
                        System.out.println(e.getMessage());
                      }
                    %><h1><%=studentName%></h1>
                      <!-- <p>StudentID = <%=request.getParameter("student")%> -->
                    <%
                  %>
            
                  <!-- display records from all selected users -->
                  <div id="classes">
                    <table>
                      <thead>
                        <th>Course Code</th>
                        <th> </th>
                      </thead>
                    <% 
                      //print out list of classes this student has taken
                      try{
                        String url="jdbc:mysql://jordan/skabone?user=skabone&password=";
                        int i=1;
                        con=DriverManager.getConnection(url);
                        stmt=con.createStatement();

                        String query = "select * from registeredcourses where StudentID = " + studentID + "";
                        rst=stmt.executeQuery(query);
                        while(rst.next()){ 
                        %>
                          <tr><td><%=rst.getString(3)%></td><td><a href="?drop=true&regClassID=<%=rst.getString(1)%>">DROP</a></td></tr>
                        <%
                        }
                        rst.close();
                        stmt.close();
                        con.close();
                      }catch(Exception e){
                        System.out.println(e.getMessage());
                      }
                    %>
                  </div>
                  <%
                  }
                }%>
          </div>
        </div><!--/span-->

      </div><!--/row-->

      <hr>
      <!-- <footer>
        <p>&copy; Jakob Anderson 2012</p>
        <br/>
        <p>Some enhanced UI elements by <a href="http://lab.simurai.com/umbrui/">Simurai Lab &raquo; Umbrui</a> and <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a></p>
        <br/>
      </footer> -->

    </div><!--/.fluid-container-->

    <!-- javascript -->
    <script src="http://localhost:1024/~skabone/js/libs/jquery.js"></script>
    <script src="http://localhost:1024/~skabone/js/libs/jquery.fittext.js"></script>
    <script type="text/javascript">
      $("#fittext1").fitText();
      $("#fittext2").fitText(1.2);
      $("#fittext3").fitText(1.1, { minFontSize: 30, maxFontSize: '96px' });
    </script>
    <script src="http://localhost:1024/~skabone/js/libs/twitter_bootstrap/bootstrap-alert.js"></script>    
  </body>
</html>