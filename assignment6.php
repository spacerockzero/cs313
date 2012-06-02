<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 6</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment6">   

<?php include('modules/frame-top.php');?>
          <div class="cf">
            <h1>Assignment 6</h1>
            <p></p>
            <form action="http://157.201.194.254:8080/cs313/servlet/s12.skabone.assign06" method="post">
              
              <label for="username">Username</label>
              <input type="text" name="username" id="username" /> 

              <label for="password">Password</label>
              <input type="password" name="password" id="password" /> 

              <input type="submit" name="submit" />

            </form>
          </div>
<?php include('modules/footer.php');?>        
    
  </body>
</html>