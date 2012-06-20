<%/*@page import="java.sql.*"*/ %>
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
  <body id="assignment7">   
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

            <!-- register new class for this user -->
            <form name="post" id="post" action="createXML.jsp" method="POST">
              <h3>Class registration</h3>

            </form>

            <!-- display records from all selected users -->
            <div id="records">
              
            </div>
          </div>
        </div><!--/span-->

      </div><!--/row-->

      <hr>
      <footer>
        <p>&copy; Jakob Anderson 2012</p>
        <br/>
        <p>Some enhanced UI elements by <a href="http://lab.simurai.com/umbrui/">Simurai Lab &raquo; Umbrui</a> and <a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a></p>
        <br/>
      </footer>

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