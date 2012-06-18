<%@page import="java.io.*,org.w3c.dom.*,javax.xml.parsers.*,javax.xml.transform.*, javax.xml.transform.dom.*,javax.xml.transform.stream.*"%>  

  <%!
    public void createXmlTree(Document doc, String username, String title, String body, String timeDate ) 
      throws Exception 
    {

    File file = new File("/home/ercanbracks/tomcat55/tomcat/webapps/cs313/jsp/s12/skabone/content.xml");
    //boolean fileExists = false;
    //if (file.exists()){fileExists = true;}

    //System.out.println(username);
    Element root = doc.createElement("post");
    doc.appendChild(root);

    Element child1 = doc.createElement("username");
    root.appendChild(child1);

    Text text1 = doc.createTextNode(username);
    child1.appendChild(text1);

    Element child2 = doc.createElement("title");
    root.appendChild(child2);

    Text text2 = doc.createTextNode(title);
    child2.appendChild(text2);

    Element child3 = doc.createElement("body");
    root.appendChild(child3);

    Text text3 = doc.createTextNode(body);
    child3.appendChild(text3);

    Element child4 = doc.createElement("timeDate");
    root.appendChild(child4);

    Text text4 = doc.createTextNode(timeDate);
    child4.appendChild(text4);

    TransformerFactory factory = TransformerFactory.newInstance();
    Transformer transformer = factory.newTransformer();

    transformer.setOutputProperty(OutputKeys.INDENT, "yes");

    StringWriter sw = new StringWriter();
    StreamResult result = new StreamResult(sw);
    DOMSource source = new DOMSource(doc);
    transformer.transform(source, result);
    String xmlString = sw.toString();

    
    BufferedWriter bw = new BufferedWriter(new FileWriter(file));
    bw.write(xmlString);
    bw.flush();
    bw.close();

  }%>
<%

  String username=request.getParameter("username");
  String title=request.getParameter("post_title");
  String body=request.getParameter("post_body");
  String timeDate=request.getParameter("date_time");

  try{
    System.out.println(username);
    DocumentBuilderFactory builderFactory = DocumentBuilderFactory.newInstance();
    DocumentBuilder docBuilder = builderFactory.newDocumentBuilder();
    Document doc = docBuilder.newDocument();
    createXmlTree(doc,username,title,body,timeDate);

    String newPost = "true";
    session.setAttribute("newPost", newPost);
    
    String redirectURL = "http://localhost:1025/cs313/jsp/s12/skabone/assign07.jsp";
    response.sendRedirect(redirectURL);
  }
  catch(Exception e){
    System.out.println(e);
  }     
%>