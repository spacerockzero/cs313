
<%
  //if user came to page without a login, send them back to login page
  if (session.getAttribute( "username" ) == null){
    String redirectURL = "http://localhost:1024/~skabone/assignment7retry.php";
    response.sendRedirect(redirectURL);
  }
  // DocumentBuilderFactory docFactory = 
  // DocumentBuilderFactory.newInstance();
  // DocumentBuilder docBuilder = docFactory.newDocumentBuilder();
  // Document doc = docBuilder.parse("/home/ercanbracks/tomcat55/tomcat/webapps/cs313/jsp/s12/skabone/content.xml");

  Object username=session.getAttribute( "username" );
  String newPost=(String)session.getAttribute( "newPost" );
  session.setAttribute("newPost", "false");
%>
<%!
  // public boolean isTextNode(Node n){
  // return n.getNodeName().equals("#text");
  // }
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
            <h1>Assignment 7</h1>
            <p>Under Construction for Assignment 8. Please be patient as I tear things apart and put them back together again.<br/> --Jakob Anderson</p>
            <hr/>

            <h3>Hello, <%= session.getAttribute( "username" ) %></h3>
            
            <!-- display success message if post was submitted successfully -->
            <% if("true".equals(newPost)) { %>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">x</button>
              <strong>Well done!</strong> You successfully posted a new entry.
            </div>
            <% } %>

            <!-- make new post from this user -->
            <form name="post" id="post" action="createXML.jsp" method="POST">
              <h3>Add new post</h3>
              <label for="post_title">Post Title</label>
              <input name="post_title" id="post_title_form" type="text" cols="80"/>
              <br/>
              
              <label for="post_body">Post Body</label>
              <textarea name="post_body" id="post_body_form" rows="20" cols="80"></textarea><br/>
              
              <input type="hidden" id="username" name="username" value="<%=username%>"/>
              <input type="hidden" id="date_time" name="date_time" value="<%= new java.util.Date() %>"/>
              
              <input name="submit" id="submit_form" class="btn btn-primary btn-large" type="submit" value="Submit new post"/>
              

            </form>

            <!-- display previous posts from all users -->
            <div id="all_posts">
              
              

              <div class="post">



                <h3>Fear of a Bot Planet</h3>
                <div class="meta">posted by Skabone, 06.01.2012</div>
                <div class="post_body_text">
                  <p>Hey, whatcha watching? Whoa a real live robot; or is that some kind of cheesy New Year's costume? Now what? Now, now. Perfectly symmetrical violence never solved anything. You, a bobsleder!? That I'd like to see! Eeeee!  Now say "nuclear wessels"!</p>
                  <p>Ooh, name it after me! Oh, how I wish I could believe or understand that! There's only one reasonable course of action now: kill Flexo! No, of course not. Yeah, that's it. Oh, I think we should just stay friends. Have you ever tried just turning off the TV, sitting down with your children, and hitting them? Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords. Cruel though they may be&hellip;</p>
                  <ul>
                  <li>Kif might!</li>
                  <li>Humans dating robots is sick. You people wonder why I'm still single? It's 'cause all the fine robot sisters are dating humans!</li>
                  </ul>
                  <p>Come, Comrade Bender! We must take to the streets! Why yes! Thanks for noticing. Meh.</p>
                  <p>Bender?! You stole the atom. Guess again. Well, then good news! It's a suppository. Fetal stemcells, aren't those controversial? You wouldn't. Ask anyway!</p>
                  <ol>
                  <li>You, a bobsleder!? That I'd like to see!</li>
                  <li>I guess if you want children beaten, you have to do it yourself.</li>
                  </ol>
                  <p>Oh Leela! You're the only person I could turn to; you're the only person who ever loved me. Why would I want to know that? What have I done? What have I done? No! The cat shelter's on to me.</p>
                </div>
              </div>
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