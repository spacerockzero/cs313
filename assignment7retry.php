<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 6</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment6">   

<?php include('modules/frame-top.php');?>
          <div class="cf">
            <h1>Assignment 7: Login FAILURE!!!</h1>
            <p>Please try to log in again with proper credentials!</p>
            <form action="http://localhost:1025/cs313/servlet/s12.skabone.assign06" method="post">
              <h3>Login Authentication</h3>
              <em>username=skabone,scott,nathan, password=password</em>
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