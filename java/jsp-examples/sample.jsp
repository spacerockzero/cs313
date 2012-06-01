<html>
<head>
<title>Sample JSP File</title>
</head>

<body>
Hello <%= request.getParameter("fname") %>
<form method="post"  action="sample.jsp">
   Enter your name and press submit
   <input type="text" name="fname"/>
   <br\><br\><input type="submit" value = "Submit it"/>
</form>
<% for (int i=1; i<6; i++)
   out.print("<H" + i + "> Sample " + i + "</h" + i + ">");
%>
</body>
</html>
