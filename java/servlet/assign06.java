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
    users.put("skabone", "password");
    users.put("steven",  "password");
    users.put("stewart", "password");

  }//end init

  public void doPost(HttpServletRequest req, HttpServletResponse res)
                               throws ServletException, IOException 
  {
    //collect username and pass from inputs
    String username = req.getParameter("username");
    String password = req.getParameter("password");

    res.setContentType("text/plain");
    PrintWriter out = res.getWriter();

    // Do we allow that user?
    if (!allowUser(username, password)) {
      // Not allowed, so report he's unauthorized
      out.println("auth fail!" + username);
      //out.println(users);
    }
    else {
      // Allowed, so show him the secret stuff
      out.println("auth success!" + username);
      //out.println(users);
    }
  }//end doGet

  // This method checks the user information sent in the Authorization
  // header against the database of users maintained in the users Hashtable.
  protected boolean allowUser(String username, String password) throws IOException {
    if (username == null) return false;  // no auth

    // Check our user list to see if that user and password are "allowed"
    if (password.equals(users.get(username)))
      return true;
    else
      return false;
  }//end allowUser
}//end class