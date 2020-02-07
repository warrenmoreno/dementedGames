<!-- 

Original Author: Warren Moreno
Date Created: January 31, 2020
Version: LiveVersion0.1
Date Last Modified: February 07th, 2020
Modified by: Warren Moreno
Modification log 2-7-2020: added required database.php, added required database.php, call to getDB()
Modification log 1-31-2020: Modified PHP, added employee list, added vistor data table, removed audio
Filename: manage_contact_info.php

-->

<?php
    require('./model/database.php');
    require('./model/employee.php');
    require('./model/vistor.php');
     /*echo "Fields: " . $vistorName . $vistorEmail . $vistorPhone . 
       $vistorMsg . $operativeRating . $eventsListing;*/
    
    if (!isset($employee_id)) {
        $employee_id = filter_input(INPUT_GET, 'employee_id', 
                FILTER_VALIDATE_INT);
        if ($employee_id == NULL || $employee_id == FALSE) {
            $employee_id = 1;
        }
    }

//            $dsn = 'mysql:host=localhost;dbname=dementeddesign';
//            $username = 'root';
//            $password = 'Pa$$w0rd';

            try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB(); //function 1
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
                exit();
            }
            
            // Read the employees from the database  
//            $query = 'SELECT employeeID, firstName From employee ORDER BY employeeID';
//            $statement = $db->prepare($query);
//            $statement->execute();
//            $employees = $statement;
            $employees = getEmployee(); //function 2
            
//            $query2 = 'SELECT * FROM vistor '
//                    . 'WHERE employeeID = :employeeID'
//                    . ' ORDER BY vistorEmail;';
//            $statement2 = $db->prepare($query2);
//            $statement2->bindValue(":employeeID", $employee_id);
//            $statement2->execute();
//            $vistor = $statement2;
//            
            $vistor = getVisitor(); //function 3
            /*echo "Fields: " . $employee_id;*/
            /* echo "Fields: " . $vistorName . $vistorEmail . $vistorMsg . 
                 $vistorPhone . $operativeRating . $eventsListing;  */
            
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
	
	<meta charset="utf-8">		
	<title>Project#04</title>
		
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Demented Games, Let Your Imagination Run Wild" />
	<meta name="keywords" content="video games, computer games, LARP">
	
	<!--<link href="css/feedback_sent.css" rel="stylesheet" media="all"/>-->
	<link href="css/visual_style2.css" rel="stylesheet" media="screen"/>
	<link href="css/print_style.css" rel="stylesheet" media="print"/>
	
        <!-- PHP table -->
        <link href="css/events_visual.css" rel="stylesheet" media="all"/>
        
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
            <li><a href="login.php">Logout</a></li>
        </ul>
    </nav>
		
	</header>
	
    <div id="container">
        
        <h2>Employees</h2>
        <aside id="empID">
            <!-- display a list of employees -->
            
            
            <nav>
            <ul id="empID2">
                <?php foreach ($employees as $employee) : ?>
                <li><a href="manage_contact_info.php?employee_id=<?php echo $employee['employeeID']; ?>">
                        <?php echo $employee['firstName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav> 
            
        </aside>


            <!-- Visitor Info Display -->
            <section id="main2">
                
                
                <table class="contacts">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="right">Message</th>
                        <th>Delete</th>
                    </thead>

                    <?php foreach ($vistor as $vistor) : ?>
                    <tr>
                        <td><?php echo $vistor['vistorName']; ?></td>
                        <td><?php echo $vistor['vistorEmail']; ?></td>
                        <td class="right"><?php echo $vistor['vistorMsg']; ?></td>
                        <td><form action="delete_modify_vistor.php" method="post">
                            <input type="hidden" name="vistor_id"
                                   value="<?php echo $vistor['vistorID']; ?>">
                            <input type="hidden" name="employee_id"
                                   value="<?php echo $vistor['employeeID']; ?>">
                            <input type="submit" value="Delete">
                            
                        </form></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                
                
            </section>
	</div>
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
