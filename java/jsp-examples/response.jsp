<html>
  <head>
      <title> Response document </title>
  </head>
  <body>
         <!--specify the bean instance -- >
        <jsp:useBean id = "myBean" scope = "session"  class = "Converter" />

         <!-- move the "celsius" form value to the bean property -- >
         <jsp:setProperty name = "myBean" property = "celsius" />

         Given Celsius temperature is:

         <!-- get the celsius value from the bean and display it in the document -- >
         <jsp:getProperty name = "myBean" property = "celsius" />

          <br />
           Equivalent temperature in Fahrenheit is:

           <!--get the "fahrenheit" value from the bean and display it in the document -- >
          <jsp:getProperty name="myBean" property="fahrenheit" />
    </body>
</html>
