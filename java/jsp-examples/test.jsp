<html>
<head>
<title>Test JSP File</title>
</head>
<body>
   Hello <%= request.getParameter("name") %>
   <form method="post" action="sample1.jsp">
      <br/> Enter your First name:
      <input type="text" name="first">
      <br/> Enter your Last name:
      <input type="text" name="last">
      <br/><br/><input type="submit">
    </form>
   <% for (int i=1; i<4; i++)
       out.print("<H" + i + "> Test " + i + "</h" + i + ">");
   %>
</body>
</html>

