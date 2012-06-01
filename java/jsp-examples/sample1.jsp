<html>
<head>
<title>Sample JSP File</title>
</head>

<body>
Hello
<%= request.getParameter("first") %>
<%= request.getParameter("last") %>
   <form method="post" action="test.jsp">
     Enter your name and press submit
     <input type="text" name="name">
     <br/><br/>
     <input type="submit">
   </form>
<%
for (int i=1; i<6; i++)
   out.print("<h" + i + "> Sample " + i + "</h" + i + ">");
%>
</body>
</html>
