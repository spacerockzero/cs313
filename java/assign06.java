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
      out.println("GET Request. No Form Data Posted");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse res)
    throws IOException, ServletException
    {
      Enumeration e = request.getParameterNames();
      PrintWriter out = res.getWriter ();
      while (e.hasMoreElements()) {
        String name = (String)e.nextElement();
        String value = request.getParameter(name);
        out.println(name + " = " + value);
      }
    }              
}