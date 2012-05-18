<?php include('modules/header-top.php');?>

    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 4</title>

<?php include('modules/header-bottom.php');?>

  <body id="assignment4">   

<?php include('modules/frame-top.php');?>

            <h1>Assignment 4</h1>
            <h3>Input SQL query</h3>
            
            <form name="query_form" action="assignment4-post.php" method="POST">
              <input type="textfield" name="query" id="query_field" value="SELECT * FROM students"></textfield>
              <input type="button" value="submit query" onclick="MakeRequest()"/>
            </form>
            
            <h3>Results:</h3>
            <p id="result"></p>

<?php include('modules/footer.php');?>        
    <script type="text/javascript">
        var query;
        function getXMLHttp()
        {
          var xmlHttp

          try
          {
            //Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
          }
          catch(e)
          {
            //Internet Explorer
            try
            {
              xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e)
            {
              try
              {
                xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              catch(e)
              {
                alert("Your browser does not support AJAX!")
                return false;
              }
            }
          }
          return xmlHttp;
        }

        function MakeRequest()
        {
          
          var xmlHttp = getXMLHttp();
          
          xmlHttp.onreadystatechange = function()
          {
            if(xmlHttp.readyState == 4)
            {
              HandleResponse(xmlHttp.responseText);
            }
          }
          //query = document.getElementById('query_field').value;
          query = "SELECT * FROM students";
          xmlHttp.open("POST", "assignment4-post.php", true); 
          xmlHttp.send(query);
        }

        function HandleResponse(response)
        {
          console.log(response);
          document.getElementById('result').innerHTML = response;
          //$('#scifi_form').fadeOut();
        }

    </script>
  </body>
</html>