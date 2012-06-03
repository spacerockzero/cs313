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

public class assign06 extends HttpServlet {

  public void doGet(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
    {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      out.println("GET Request. No Form Data Posted, son");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
    {
      String username = "skabone";
      String password = "skabone";

      PrintWriter out = response.getWriter ();

      //collect username and pass from inputs
      String submittedUsername = request.getParameter ("username");
      String submittedPassword = request.getParameter ("password");

      //print input values for debugging
      //out.println("submitted username = " + submittedUsername + ", submitted password = " + submittedPassword);
      
      //check if username is correct for debugging
      // if (username.equals(submittedUsername)) {
      //   out.println("Username " + submittedUsername + " is correct");
      // } else {
      //   out.println("Username " + submittedUsername + " is incorrect. Try again");
      // }
      
      // //check if password is correct for debugging
      // if (password.equals(submittedPassword)) {
      //   out.println("Password " + submittedPassword + " is correct");
      // } else {
      //   out.println("Password " + submittedPassword + " is incorrect. Try again");
      // }

      //check if username & pass are correct, then redirect accordingly.
      if (username.equals(submittedUsername) && password.equals(submittedPassword)) {
        
        //start new session, assign attribute of username to session variable
        HttpSession session = request.getSession(true);
        
        if (session.isNew()){
          session.setAttribute("username", submittedUsername);
        }

        //send successful login to success page.
        response.sendRedirect("http://localhost:1024/~skabone/assignment6success.php");
      }
      else {
        //send unsuccessful login back to login page
        response.sendRedirect("http://localhost:1024/~skabone/assignment6retry.php");
      }
    }              
}