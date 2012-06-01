<html>
<head>
<title>Printing Values</title>
</head>
<body>
   <%
   int i, max;
   max = 8;
   for (i=1; i < max; i++)
   {
   %>
      <font size="<%=i%>">
         Font Size = <%=i%>
      </font>
      <br/>
   <%
   }
   %>
</body>
</html>
