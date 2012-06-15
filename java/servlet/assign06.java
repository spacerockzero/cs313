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
  boolean isValid = false;

  public void doPost(HttpServletRequest request, HttpServletResponse response)
    throws IOException, ServletException
  {

    //collect username and pass from inputs
    String submittedUsername = request.getParameter ("username");
    String submittedPassword = request.getParameter ("password");

    PrintWriter out = response.getWriter ();

    String filename = "/WEB-INF/classes/s12/skabone/users.dat";

    String username = "";
    String password = "";  
    
    ServletContext context = getServletContext();
     
    // First get the file InputStream using ServletContext.getResourceAsStream() method.
    InputStream is = context.getResourceAsStream(filename);
    if (is != null) {
      InputStreamReader isr = new InputStreamReader(is);
      BufferedReader reader = new BufferedReader(isr);

      String text = "";
       
      // We read the file line by line and later will be displayed on the browser page.
      //Map m1 = new HashMap();
      
      

      int i = 0;
      //boolean isValid = false;
      while ((text = reader.readLine()) != null) {
          //out.println(text); 
          if (i % 2 == 0){
            username = text;
            // out.println("username = " + username);
          } else if (i % 2 == 1) {
            password = text;
            // out.println("password = " + password);
          }
          if (username.equals(submittedUsername) && password.equals(submittedPassword)) {
            isValid = true;
          }
        i = i+1;
      }//end while

    } else {
      out.println("Something is very wrong with file reader");
    }
    
    //check if username & pass are correct, then redirect accordingly.
     if (isValid == true) {
       
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
  }  //end doPost            
} //end class