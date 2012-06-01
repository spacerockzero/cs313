<html>
<head>
<title>Printing Values</title>
</head>
<body>
   <%
     int i, max;
     max = 16;
     for (i=8; i < max; i++)
     {
   %>
       <span style = "font-size: <%=i%>pt">Font Size = <%=i%> </span>
       <br/>
   <%
     }
   %>
</body>
</html>
