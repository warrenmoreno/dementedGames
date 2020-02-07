<!-- 

Original Author: Warren Moreno
Date Created: February 07th, 2020
Version: LiveVersion0.1
Date Last Modified: February 07th, 2020
Modified by: Warren Moreno
Modification log: 
Filename: login.php

-->

<!DOCTYPE html>
<html lang="en">
	
<head>
	
	<meta charset="utf-8">		
	<title>Project#04</title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Demented Games, Let Your Imagination Run Wild" />
	<meta name="keywords" content="video games, computer games, LARP">
	
	<link href="css/visual_feedback.css" rel="stylesheet" media="all"/>
	<link href="css/visual_style2.css" rel="stylesheet" media="screen"/>
	<link href="css/print_style.css" rel="stylesheet" media="print"/>
	
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
	<link rel="manifest" href="images/favicon_io/site.webmanifest">

	
</head>

<body>
	<header>
	
		
	
		<h1>Demented Games, <br/>play for fun, stay to broaden your horizons...</h1>
		
    <nav class="horizontal">
	 <a id="navicon" href="#"><img src="images/navicon.png" alt="" /></a>
		<ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li><a <a class="active" href="login.php">Login</a></li>
        </ul>
    </nav>
		
	</header>
	
	<section>
		<!-- Info gathering -->
                <form id="loginScreen" method="post" action="manage_contact_info.php" >
			<fieldset id="custIdea">
			
				<legend>Login</legend>
				
				<div class="loginRow">
                                    <label for="name">Username</label><br>
                                    <input name="name" id="name" type="text" required />
				</div>
				
				
				<div class="loginRow">
                                    <label for="password">Password</label><br>
                                    <input name="password" id="password" type="password" required />
				</div>
				
			</fieldset>
			
			<!-- Buttons -->
			<div id="buttons">
				<input type="submit" value="Login" />
			</div>
			
	  </form>
	  
	</section>
	
	<!--contact number-->
	<footer>
		Call <a href="tel:+12086250197">(208) 625-0197</a> for any questions about upcoming events,
		or check us out on Facebook or Twitich.<br /><br />
			
		<a href="https://twitch.tv/" target="_blank">
			<img src="images/iconmonstr-twitch-3-64.png" alt="social icon for GitHub"></a>
			
		<a href="https://www.facebook.com/" target="_blank">
			<img src="images/iconmonstr-facebook-3-64.png" alt="social icon for Linkedin"></a>
			
	</footer>
	
</body>


</html>