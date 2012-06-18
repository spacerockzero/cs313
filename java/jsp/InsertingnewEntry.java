/* 
 * @Program for Inserting a New Entry in a List
 * Insertingnewentry.java 
 * Author:-RoseIndia Team
 * Date:-10-Jun-2008
 */

import java.io.*;
import org.w3c.dom.*;
import javax.xml.parsers.*;
import javax.xml.transform.*;
import javax.xml.transform.dom.*;
import javax.xml.transform.stream.*;

public class Insertingnewentry {

  public static void main(String[] args) throws Exception {
  DocumentBuilderFactory factory = 
   DocumentBuilderFactory.newInstance();
  Document doc = 
   factory.newDocumentBuilder().parse(new File("2.xml"));
  new Insertingnewentry().Insertingnewentry(
   doc, "komal", "Male", "Developer");
  }

  public void Insertingnewentry(Document doc, 
   String name, String Sex, String Status)
   throws Exception {

  Element person = doc.createElement("Roseindia");
  Element Node = doc.createElement("employeename");

  person.appendChild(Node);
  Text nametextNode = doc.createTextNode(name);
  Node.appendChild(nametextNode);

  Element root = doc.getDocumentElement();


  Element phoneNo = doc.createElement("Sex");
  person.appendChild(phoneNo);
  Text phonetextNode = doc.createTextNode(Sex);
  phoneNo.appendChild(phonetextNode);

  Element emailNode = doc.createElement("Status");
  person.appendChild(emailNode);
  Text emailtextNode = doc.createTextNode(Status);
  emailNode.appendChild(emailtextNode);
  root.appendChild(person);

  Node firstNode = root.getFirstChild();
  root.insertBefore(person, firstNode);

  TransformerFactory factory = 
   TransformerFactory.newInstance();
  Transformer transformer = factory.newTransformer();

  transformer.setOutputProperty(OutputKeys.INDENT, "yes");

  // create string from xml tree
  StringWriter sw = new StringWriter();
  StreamResult result = new StreamResult(sw);
  DOMSource source = new DOMSource(doc);
  transformer.transform(source, result);
  String xmlString = sw.toString();

  System.out.println(xmlString);


  }
}