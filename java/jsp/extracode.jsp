<%
          Element  element = doc.getDocumentElement(); 
          NodeList postNodes = element.getChildNodes(); 
          for (int i=0; i<postNodes.getLength(); i++){
            Node post = postNodes.item(i);
            if (isTextNode(post))
            continue;
            NodeList PostList = post.getChildNodes(); 
            %>
        <div class="post">
            <%
            for (int j=0; j<PostList.getLength(); j++ ){
              Node node = PostList.item(j);
              if ( isTextNode(node)) 
              continue;
              %>
              <div><%= node.getFirstChild().getNodeValue() %></div>
              <%
            } 
            %>
        </div><!-- end post -->
            <%
            }
          %>

          <%@page import="org.w3c.dom.*, javax.xml.parsers.*" %>

          transformer.setOutputProperty(OutputKeys.OMIT_XML_DECLARATION, "yes");

          //if(fileExists == true){
      //transformer.setOutputProperty(OutputKeys.OMIT_XML_DECLARATION, "yes");
    //}

    transformer.setOutputProperty(OutputKeys.INDENT, "yes");

    transformer.setOutputProperty(OutputKeys.METHOD, "xml");
    transformer.setOutputProperty(OutputKeys.ENCODING, "UTF-16");
    //transformer.setOutputProperty(OutputKeys.INDENT, "yes");
    transformer.setOutputProperty(OutputKeys.MEDIA_TYPE, "text/xml");
    transformer.setOutputProperty(OutputKeys.STANDALONE, "yes");

    NEED:
    read xml file, 
    delete first two lines? xml did and root tag <content>
    delete last line? </content>

    copy old xml string to var

    write xml did and root tag <content> to file
    write old xml string to file
    write new xml to file
    write new closing root tag </content>
    close file

    phew.

    Read and parse out xml on asp view of content
<%
    try {
            // Parse the initial document
            ByteArrayInputStream is = new ByteArrayInputStream(initial.getBytes());
            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbf.newDocumentBuilder();
            Document doc = db.parse(is);

            // Create the new xml fragment
            Text a = doc.createTextNode("afds");
            Node p = doc.createElement("parameterDesc");
            p.appendChild(a);
            Node i = doc.createElement("insert");
            i.appendChild(p);
            Element r = doc.getDocumentElement();
            r.insertBefore(i, r.getFirstChild());
            r.normalize();

            // Format the xml for output
            Transformer transformer = TransformerFactory.newInstance().newTransformer();
            transformer.setOutputProperty(OutputKeys.INDENT, "yes");

            // initialize StreamResult with File object to save to file
            StreamResult result = new StreamResult(new StringWriter());
            DOMSource source = new DOMSource(doc);
            transformer.transform(source, result);

            System.out.println(result.getWriter().toString());

        } catch (Exception e) {
            e.printStackTrace();
        }

        %>