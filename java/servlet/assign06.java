 /**************************************
 *   Program:  
 *      Assignment 06, Java Servlet
 *      Jakob Anderson, cs313
 ***************************************/
package s12.skabone;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

// import java.io.BufferedReader;
// import java.io.IOException;
// import java.io.InputStream;
// import java.io.InputStreamReader;
// import java.io.PrintWriter;
// import javax.servlet.ServletContext;
// import javax.servlet.ServletException;
// import javax.servlet.http.HttpServlet;
// import javax.servlet.http.HttpServletRequest;
// import javax.servlet.http.HttpServletResponse;

public class assign06 extends HttpServlet {

  public void doGet(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
    {
      // //create/set file
      // // File filename = new File("tomcat/webapps/cs313/WEB-INF/classes/s12/skabone/users.dat");
      // response.setContentType("text/html");
      // // ServletContext context = getServletContext();
      
      // // InputStream inp = context.getResourceAsStream(filename);
      
      // if (inp != null) {
      //   // InputStreamReader isr = new InputStreamReader(inp);
      //   // BufferedReader reader = new BufferedReader(isr);
      //   // PrintWriter pw = response.getWriter();
      //   pw.println("<html><head><title>Read Text File</title></head><body bgcolor='cyan'></body></html>");
      //   String text = "";
        
      //   while ((text = reader.readLine()) != null) {
      //     pw.println("<h2><i><b>"+text+"</b></i></b><br>");
      //   }

      //   pw.println("</body></html>");
      // }
      
      // response.setContentType("text/html");
      // PrintWriter out = response.getWriter();
      // out.println("GET Request. No Form Data Posted, son");

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
    {
      String username = "skabone";
      String password = "password";

      PrintWriter out = response.getWriter ();

      //collect username and pass from inputs
      String submittedUsername = request.getParameter ("username");
      String submittedPassword = request.getParameter ("password");

      //print input values
      out.println(submittedUsername + ", " + submittedPassword);
      if (username == submittedUsername) {
        out.println("Username " + submittedUsername + " is correct");
      } else {
        out.println("Username " + submittedUsername + " is incorrect. Try again");
      }
      if (password == submittedPassword) {
        out.println("Password " + submittedPassword + " is correct");
      } else {
        out.println("Password " + submittedPassword + " is incorrect. Try again");
      }


    }              
}