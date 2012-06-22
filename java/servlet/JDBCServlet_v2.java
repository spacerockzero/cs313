// JDBCServlet_v2.java

// Based on JDBCServlet.java from Sebesta, Programming the World Wide Web,
// 3rd Edition, p. 607-610

// Modified by P. Conrad to avoid taking a SQL query directly
// from a web page.

package edu.udel.cis.pconrad.web;

import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import java.sql.*;

public class JDBCServlet_v2 extends HttpServlet {

    final private String username = "carsuser";
    final private String password = "xxxxxxxx";
    final private String URL = "jdbc:mysql://jaguar.cis.udel.edu:8099/sebesta";

    private Connection myCon;
    private Statement myStmt;

    // The init method - instantiate the db driver, connet to the db,
    // and create a statement for an SQL command

    public void init() {

	// Instatiate the driver for MySQL

	try {
	    Class.forName("org.gjt.mm.mysql.Driver").newInstance();
	}
	catch (Exception e) {
	    e.printStackTrace();
	}

	// Create the connection to the cars db
	

	try {
	    myCon = DriverManager.getConnection(URL,username,password);
	}
	catch (SQLException e) {
	    e.printStackTrace();
	}

	// Create the statement for SQL queries

	try {
	    myStmt = myCon.createStatement();
	}
	catch (Exception e){
	    e.printStackTrace();
	}

    } // init

    // the doGet method - get the query, perform it, and produce
    // an HTML table of the results

    public void doGet(HttpServletRequest request,
		      HttpServletResponse response)
		      throws ServletException, IOException {


	// Get the parameter values

	String bodyStyle, operator, miles;

	bodyStyle = request.getParameter("bodyStyle");
	operator = request.getParameter("operator");
	miles = request.getParameter("miles");
     
	// Set the MIME type and get a writer

	response.setContentType("text/html;charset=utf-8");
	PrintWriter out = response.getWriter();

	// Create the initial html and display the request

	out.println("<!DOCTYPE html " +
		    "PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" " +
		    "\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">");
	out.println("<html>");
	out.println("<head>" +
		    "<title>JDBCServlet_v2</title>" +
		    "<style type=\"text/css\"> " + 
		    "  body {color: black; background-color:#99CCFF;} " + 
		    "</style>" +
		    "</head>");
	out.println("<body>");

	out.println("<h1>Results</h1>");
	out.println("<h2>Parameter values</h2>");
	out.println("<p>bodyStyle=" + bodyStyle  + "</p>");
	out.println("<p>operator=" + operator  + "</p>");
	out.println("<p>miles=" + miles  + "</p>");

	String query = "SELECT * FROM Corvettes";

	if (bodyStyle==null || bodyStyle =="")
	    {
		if (operator == " " || operator == "" || operator == null
		                    || miles == "" || miles == null)
		    {
			// query is finished
		    }
		else
		    {
			query = 
			    query + " WHERE Miles " + operator + " " + miles;
		    }

	    }
	else
	    {
		query = query + " WHERE Body_style='" + bodyStyle + "'";
		if (operator == " " || operator == "" || operator == null
		                    || miles == "" || miles == null)
		    {
			// query is finished
		    }
		else
		    {
			query = 
			    query + " AND Miles " + operator + " " + miles;
		    }

		

	    }


	out.println("<h2>The SQL Query:</h2>");
	out.println("<p>query=" + query + "</p>");

	out.println("<h2>Result of the Query:</h2>");

	// Perform the query

	try {
	    ResultSet result = myStmt.executeQuery(query);

	    // Get the result's metadata and the number of result rows

	    ResultSetMetaData resultMd = result.getMetaData();
	    int numCols = resultMd.getColumnCount();
	    
	    // produce the table header and caption

	    out.println("<table border>");
	    out.println("<caption><strong>Query Results</strong></caption>");
	    out.println("<tr>");
	    
	    // Loop to produce the column headings 

	    int index;
	    String colName;

	    for (index = 1; index <= numCols; index ++) {
		colName = resultMd.getColumnLabel(index);
		out.print("<th>" + colName + "</th>");	    
	    }

	    out.println("</tr>");

	    // Loop to produce the rows of the result

	    while (result.next()) {
		out.println("<tr>");

		// Loop to produce the data of a row of the result 

		String dat;
		
		for (index = 1; index <= numCols; index++) {
		    dat = result.getString(index);
		    out.println("<td>" + dat + "</td>");
		} //** end of loop over one row of result

		out.println("</tr>");
		
	    } // result.next...

	    out.println("</table>");

	} // end of try 

	catch (Exception e) {
	    e.printStackTrace();
	} 
	
	out.println("<hr />");

	out.println
	    ("<p>" + 
	     "<a href=\"http://validator.w3.org/check?uri=referer\">" + 
	     "<img src=\"http://www.udel.edu/CIS/images/valid-xhtml11.png\""+
	     "  alt=\"Valid XHTML 1.1\" width=\"88\" height=\"31\" " +
	     "  longdesc=\"http://validator.w3.org\" /></a> " +	     
	     "<a href=\"http://jigsaw.w3.org/css-validator/check/referer\"> " +
	     "  <img style=\"border:0;width:88px;height:31px\" " +
	     "   src=\"http://www.udel.edu/CIS/images/vcss.png\" " +
	     "   alt=\"Valid CSS!\" /></a></p> ");
	out.println("</body>");
	out.println("</html>");

    } // end of doGet method

} // class JDBCServlet_v2
