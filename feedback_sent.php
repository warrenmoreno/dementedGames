<!-- 

Original Author: Warren Moreno
Date Created: August 28th, 2019
Version: LiveVersion0.1
Date Last Modified: February 7th, 2020
Modified by: Warren Moreno
Modification log: removed else $dsn/$username/$password, required database.php & call to getDB()
Filename: feedback_sent.php

-->
<?php
    require('./model/database.php');
    $error_message = NULL;
    
    $vistorName = filter_input(INPUT_POST, 'gamerName');
    $vistorEmail = filter_input(INPUT_POST, 'gamerEmail');
    $vistorPhone = filter_input(INPUT_POST, 'gamerPhone');
    $vistorMsg = filter_input(INPUT_POST, 'custExp');
    $operativeRating = filter_input(INPUT_POST, 'serviceRate');
    $eventsListing = filter_input(INPUT_POST, 'mailEvents');
    
     /*echo "Fields: " . $vistorName . $vistorEmail . $vistorPhone . 
       $vistorMsg . $operativeRating . $eventsListing;*/
    /*echo "EventsListing1: " . $eventsListing;*/
    
    if ($eventsListing == 'yes'){
        $eventsListing = 1;
    } else {
        ($eventsListing = 0);
    }
    
    /*echo "EventsListing2: " . $eventsListing;*/
    if ($vistorName == null || $vistorEmail == null) {
        $error_message = "There's something wrong with you entry data. "
                . "Check all data fields and attempt again.";
        /* include('error.php'); */
        //echo "Form Data Error: " . $error_message; 
        //exit();
        } else {
//            $dsn = 'mysql:host=localhost;dbname=dementeddesign';
//            $username = 'root';
//            $password = 'Pa$$w0rd';

            try {
//                $db = new PDO($dsn, $username, $password);
                $db = Database::getDB(); //function 1

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('error.html'); */
                //echo "DB Error: " . $error_message; 
                //exit();
                
            }
            
        if (!$error_message){
                // Add the product to the database 
             
            $query = 'INSERT INTO vistor
                         (vistorName, vistorEmail, vistorMsg, vistorPhone, operativeRating, eventsListing, employeeID)
                      VALUES
                         (:vistorName, :vistorEmail, :vistorMsg, :vistorPhone, :operativeRating, :eventsListing, 2)';
            $statement = $db->prepare($query);
            $statement->bindValue(':vistorName', $vistorName);
            $statement->bindValue(':vistorEmail', $vistorEmail);
            $statement->bindValue(':vistorMsg', $vistorMsg);
            $statement->bindValue(':vistorPhone', $vistorPhone);
            $statement->bindValue(':operativeRating', $operativeRating);
            $statement->bindValue(':eventsListing', $eventsListing);
            //$statement->execute();
            try {
                $count = $statement->execute();
            } catch (Exception $ex) {
                $error_message = "We are experience some kind of error.<br> Please try again.";
            }
            
            $statement->closeCursor();
            /* echo "Fields: " . $vistorName . $vistorEmail . $vistorMsg . 
                 $vistorPhone . $operativeRating . $eventsListing;  */
            /*echo "EventsListing3: " . $eventsListing;*/
            
            if($count < 1 ){
                $error_message = "We are experience some kind of error entering your data.<br> Please try again.";
            } else {
                $error_message = "<p>Thank you, $vistorName, for the wealth of booty, now carry on adventurer!</p>" 
                        . "<p>A Message will be sent to $vistorEmail shortly to confirm this communique.</p>";
            }
        }
            
            
            
    }
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
	
	<meta charset="utf-8">		
	<title>Project#04</title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Demented Games, Let Your Imagination Run Wild" />
	<meta name="keywords" content="video games, computer games, LARP">
	
	<link href="css/feedback_sent.css" rel="stylesheet" media="all"/>
	<link href="css/visual_style2.css" rel="stylesheet" media="screen"/>
	<link href="css/print_style.css" rel="stylesheet" media="print"/>
	
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
	<link rel="manifest" href="images/favicon_io/site.webmanifest">

</head>

<body>
	<header>
	
		<audio autoplay loop controls >
			<source src="audio/darren-curtis-the-old-pumpkin-patch.mp3" autoplay="true" type="audio/mp3" />
			
			<p><em>To play this audio clip, your browser needs to support HTML5.</em></p>
		</audio>
		 
		<!-- The Old Pumpkin Patch by Darren-Curtis | https://soundcloud.com/desperate-measurez
		Music promoted by https://www.free-stock-music.com
		Creative Commons Attribution 3.0 Unported License
		https://creativecommons.org/licenses/by/3.0/deed.en_US -->
	
		<h1>Demented Games, <br/>play for fun, stay to broaden your horizons...</h1>
		
    <nav class="horizontal">
	 <a id="navicon" href="#"><img src="images/navicon.png" alt="" /></a>
		<ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="events.html">Events</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="feedback.html">Feedback</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
		
	</header>
	
	
	<!-- Completion Message -->
	<div id="complete">
		<img src="images/treasure_chest.png" alt="" />
		<p><?php echo $error_message ?></p>
                
		
	</div>
	
	<!--contact number-->
	
	<footer>
		Call <a href="tel:+12086250197">(208) 625-0197</a> for any questions about upcoming events,
		or check us out on Facebook or Twitch.<br /><br />
			
		<a href="https://twitch.tv/" target="_blank">
			<img src="images/iconmonstr-twitch-3-64.png" alt="social icon for GitHub"></a>
			
		<a href="https://www.facebook.com/" target="_blank">
			<img src="images/iconmonstr-facebook-3-64.png" alt="social icon for Linkedin"></a>
			
	</footer>
	
</body>


</html>