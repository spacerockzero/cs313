<!-- index.jsp   form for Temperature converter -->

<html>
   <head>
         <title> index.jsp for tempConvert </title>
    </head>
     <body>
         <h2> Welcome to the temperature converter service </h2>
          <form name="temperatureConverter" action = "response.jsp"  method = "post" >
              Enter a temperature in Celsius:
              <input type = "text" name="celsius" value =""  size = "4" />
              <input type = "submit"  value = "Convert to Fahrenheit" />
          </form>
      </body>
</html>

