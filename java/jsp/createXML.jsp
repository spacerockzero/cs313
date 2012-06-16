<%@page import="java.io.*,org.w3c.dom.*,javax.xml.parsers.*,javax.xml.transform.*, javax.xml.transform.dom.*,javax.xml.transform.stream.*"%>  

  <%!
    public void createXmlTree(Document doc, String name, String address, String contact, String email ) 
      throws Exception 
    {
    System.out.println(name);
    Element root = doc.createElement("post");
    doc.appendChild(root);

    Element child1 = doc.createElement("Name");
    root.appendChild(child1);

    Text text1 = doc.createTextNode(name);
    child1.appendChild(text1);

    Element child2 = doc.createElement("Address");
    root.appendChild(child2);

    Text text2 = doc.createTextNode(address);
    child2.appendChild(text2);

    Element child3 = doc.createElement("ContactNo");
    root.appendChild(child3);

    Text text3 = doc.createTextNode(contact);
    child3.appendChild(text3);

    Element child4 = doc.createElement("Email");
    root.appendChild(child4);

    Text text4 = doc.createTextNode(email);
    child4.appendChild(text4);

    TransformerFactory factory = TransformerFactory.newInstance();
    Transformer transformer = factory.newTransformer();

    transformer.setOutputProperty(OutputKeys.INDENT, "yes");

    StringWriter sw = new StringWriter();
    StreamResult result = new StreamResult(sw);
    DOMSource source = new DOMSource(doc);
    transformer.transform(source, result);
    String xmlString = sw.toString();

    File file = new File("/home/ercanbracks/tomcat55/tomcat/webapps/cs313/jsp/s12/skabone/content.xml");
    BufferedWriter bw = new BufferedWriter(new FileWriter(file));
    bw.write(xmlString);
    bw.flush();
    bw.close();

  }%>
<%
  String name=request.getParameter("name");
  String address=request.getParameter("address");
  String contact=request.getParameter("contact");
  String email=request.getParameter("email");
  try{
    System.out.println(name);
    DocumentBuilderFactory builderFactory = DocumentBuilderFactory.newInstance();
    DocumentBuilder docBuilder = builderFactory.newDocumentBuilder();
    Document doc = docBuilder.newDocument();
    createXmlTree(doc,name,address,contact,email);

    out.println("<b>Xml File Created Successfully</b>");
  }
  catch(Exception e){
    System.out.println(e);
  }     
%>