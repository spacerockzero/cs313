/**********************************
 * The Session testing servlet.
 *
 ***********************************/
public class session extends HttpServlet {

   public void doGet(HttpServletRequest request,
                      HttpServletResponse response)
        throws IOException, ServletException
    {
       HttpSession session = request.getSession(true);
       response.setContentType("text/html");
       PrintWriter out = response.getWriter();
       out.println("<html>");
       out.println("<head>");
       out.println("<title>");
       out.println("Session Info Servlet");
       out.println("</title>");
       out.println("</head>");
       out.println("</html>");

       if (session.isNew())
       {
          out.println("<H1>New Session </H1>");
          out.println("The count is set to 0.");
          session.setAttribute("count", new Integer(1));
       }
       else
       {
          Integer count;
          int intCount = 0;
          count = (Integer) session.getAttribute("count");
          if (count != null) intCount = count.intValue() + 1;
          out.println("<h1>Session Information</h1>");
          out.println("The count is set to " + intCount + ".");
          out.println("<BR>");
          session.setAttribute("sessioninfo.count", new Integer(intCount));
          out.println("Session ID: " + session.getId());
          out.println("<br/>");
          out.println("Creation Time: " + (new Date(session.getCreationTime())));
          out.println("<br/>");
          out.println("Last Accessed Time: " + (new Date(session.getLastAccessedTime())));
          out.println("<br/>");    
       }
       out.println("<a href=\"");
       out.println(response.encodeURL(HttpUtils.getRequestURL(request).toString()));
       out.println("\">");
       out.println("Press Here");
       out.println("</a>");
       out.println("To reload the page with url encoding.");
       out.println("</body>");
       out.println("</html>");
       out.close();
    }
}
