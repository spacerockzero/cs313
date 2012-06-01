<html>
<head>
<title>Session</title>
</head>
<body>
   <%@ page import = "java.util.*" %>
   <%
	if(session.isNew())
	{
   %>
        <h1> New Session </h1>
	Count is set to 0.
   <%
	  session.setAttribute("sessioninfo.count", new Integer(0));
	}
	else
	{
	   Integer count;
	   int intCount = 0;
	   count = (Integer) session.getAttribute("sessioninfo.count");
	   if(count != null) intCount = count.intValue() + 1;
   %>
   <h1> Session Information </h1>
   <%
	out.println("The count is set to " + intCount + ".<br/>");
	session.setAttribute("sessioninfo.count", new Integer(intCount));
	out.println("Session ID: " + session.getId());
	out.println("<br/>");
	out.println("Creation Time: " + new Date(session.getCreationTime()));
	out.println("<br/>");
	out.println("here Last Accessed: " + new Date(session.getLastAccessedTime()));
	out.println("<br/>");
     }
   %>
</body>
</html>
