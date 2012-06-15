 /*******************************************************************
 *   Program:  
 *      Assignment 06, Java Servlet (reworked for assignment 7 and 8)
 *      Jakob Anderson, cs313
 *******************************************************************/
package s12.skabone;
import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

@SuppressWarnings("unchecked")
public class assign06 extends HttpServlet {

  Hashtable users = new Hashtable();

  public void init(ServletConfig config) throws ServletException {
    super.init(config);

    // Names and passwords are case sensitive!
    // users.put("skabone", "password");
    // users.put("steven",  "password");
    // users.put("stewart", "password");

  }//end init

  public void doPost(HttpServletRequest req, HttpServletResponse res)
                               throws ServletException, IOException 
  {
    //collect username and pass from inputs
    String formUsername = req.getParameter("username");
    String formPassword = req.getParameter("password");

    //get user data file
    String filename = "/WEB-INF/classes/s12/skabone/users.dat";

    ServletContext context = getServletContext();

    // First get the file InputStream using ServletContext.getResourceAsStream() method.
    InputStream is = context.getResourceAsStream(filename);
    
    if (is != null) {
      InputStreamReader isr = new InputStreamReader(is);
      BufferedReader reader = new BufferedReader(isr);

      String text = "";
      String username = "";
      String password = "";
       
      // We read the file line by line and later will be displayed on the browser page.
      int i = 0;
      while ((text = reader.readLine()) != null) {
        if (i % 2 == 0){
          username = text;
        } else if (i % 2 == 1) {
          password = text;
        }
        // Put elements to the map 
        users.put(username, password);
        i = i+1;
      }//end while

      res.setContentType("text/plain");
      PrintWriter out = res.getWriter();

      // Do we allow that user?
      if (allowUser(formUsername, formPassword) == false) {
        // AUTH SUCCESS !!!
        //out.println("auth fail!" + formUsername);
        //out.println(users);

        res.sendRedirect("http://localhost:1024/~skabone/assignment6retry.php");
      }
      else if (allowUser(formUsername, formPassword) == true){
        // AUTH FAIL !!!
        // out.println("auth success!" + formUsername);
        // out.println(users);

        //start new session, assign attribute of username to session variable
        HttpSession session = req.getSession(true);

        if (session.isNew()){
         session.setAttribute("username", formUsername);
        }
        res.sendRedirect("http://localhost:1025/cs313/jsp/s12/skabone/assign07.jsp");
      }
    }//end if
  }//end doPost

  // This method checks the user information sent in the Authorization
  // header against the database of users maintained in the users Hashtable.
  protected boolean allowUser(String formUsername, String formPassword) throws IOException {
    if (formUsername == null) return false;  // no username

    // Check our user list to see if that user and password are valid
    if (formPassword.equals(users.get(formUsername)))
      return true;
    else
      return false;
  }//end allowUser
}//end class