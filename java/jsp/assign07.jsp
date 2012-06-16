<!doctype html>
<html>
  <head>
    <title>Jakob Anderson >> CS313 [Web Engineering II] | Assignment 7 JSP</title>
    <link href="style.css" rel="stylesheet"/>
  </head>
  <body id="assignment7">   
    <div class="cf">
      <h1>Assignment 7</h1>
      <p>Under Construction for Assignment 8. Please be patient as I tear things apart and put them back together again.<br/> --Jakob Anderson</p>
      
      <h3>Hello, <%= session.getAttribute( "username" ) %></h3>
      
      <!-- display previous posts from all users -->
      <form action="assign07.jsp" method="POST">

        <label for="post_title">Post Title</label><br/>
        <input name="post_title" id="post_title_form" type="text"/>
        
        <br/>
        <br/>
        
        <label for="post_body">Post Body</label><br/>
        <textarea name="post_body" id="post_body_form" rows="20" cols="40"></textarea><br/>
        
        <input name="submit" id="submit_form" type="submit" value="Submit new post"/>

      </form>

      <!-- display previous posts from all users -->
      <div id="all_posts">
        <div class="post">
          <h3>Fear of a Bot Planet</h3>
          <div class="meta">posted by Skabone, 06.01.2012</div>
          <div class="post_body_text">
            <p>Hey, whatcha watching? Whoa a real live robot; or is that some kind of cheesy New Year's costume? Now what? Now, now. Perfectly symmetrical violence never solved anything. You, a bobsleder!? That I'd like to see! Eeeee!  Now say "nuclear wessels"!</p>
            <p>Ooh, name it after me! Oh, how I wish I could believe or understand that! There's only one reasonable course of action now: kill Flexo! No, of course not. It was&hellip; uh&hellip; porno. Yeah, that's it. Oh, I think we should just stay friends. Have you ever tried just turning off the TV, sitting down with your children, and hitting them? Goodbye, cruel world. Goodbye, cruel lamp. Goodbye, cruel velvet drapes, lined with what would appear to be some sort of cruel muslin and the cute little pom-pom curtain pull cords. Cruel though they may be&hellip;</p>
            <ul>
            <li>Kif might!</li>
            <li>And I'm his friend Jesus.</li>
            <li>No, of course not. It was&hellip; uh&hellip; porno. Yeah, that's it.</li>
            <li>Humans dating robots is sick. You people wonder why I'm still single? It's 'cause all the fine robot sisters are dating humans!</li>
            </ul>
            <p>Come, Comrade Bender! We must take to the streets! Why yes! Thanks for noticing. Meh.</p>
            <p>Bender?! You stole the atom. Guess again. Well, then good news! It's a suppository. Fetal stemcells, aren't those controversial? You wouldn't. Ask anyway!</p>
            <ol>
            <li>You, a bobsleder!? That I'd like to see!</li>
            <li>I guess if you want children beaten, you have to do it yourself.</li>
            </ol>
            <p>Oh Leela! You're the only person I could turn to; you're the only person who ever loved me. Why would I want to know that? Oh God, what have I done? Oh God, what have I done? No! The cat shelter's on to me.</p>
          </div>
        </div>
      </div>
    </div>    
  </body>
</html>