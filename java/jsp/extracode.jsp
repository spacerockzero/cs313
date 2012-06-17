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