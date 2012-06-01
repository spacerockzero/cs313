<html>
<head>
<title>Looping - sample JSP File</title>
</head>
<%
  String names[]= {"Scott","Morgan","Cheryl","Karen","Neil"};
  int i,max;
  max = names.length;
  for (i=0; i<max; i++)
  {
%>
    I see <%=names[i]%>.<br/>  
<%
  }
%>
</body>
</html>

