<!-- 

Original Author: Warren Moreno
Date Created: Febuary 5th, 2020
Version: LiveVersion0.1
Date Last Modified: Febuary 5th, 2020
Modified by: Warren Moreno
Modification log: added ?PHP
Filename: listemployees.php

-->
<?php
    class Database {
    private static $dsn = 'mysql:host=localhost;dbname=dementeddesign';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('error.html');
                echo '</br>' . $error_message;
                exit();
            }
        }
        return self::$db;
    }
}

    class Employee {
        private $id;
        private $first_name;
        private $last_name; 

        public function __construct($id, $first_name, $last_name) {
            $this->id = $id;
            $this->first_name = $first_name;
            $this->last_name = $last_name;
        }

        public function getID() {
            return $this->id;
        }

        public function setID($value) {
            $this->id = $value;
        }

        public function getFirstName() {
            return $this->first_name;
        }

        public function setFirstName($value) {
            $this->first_name = $value;
        }

        public function getLastName() {
            return $this->last_name;
        }

        public function setLastName($value) {
            $this->last_name = $value;
        }
    }

    class EmployeeDB {
        public static function getEmployees() {
            $db = Database::getDB();
            $query = 'SELECT * FROM employee
                      ORDER BY lastName';
            $statement = $db->prepare($query);
            $statement->execute();

            $employees = array();
            foreach ($statement as $row) {
                $employee = new Employee($row['employeeID'],
                                         $row['firstName'],
                                         $row['lastName']);
                $employees[] = $employee;
            }
            return $employees;
        }
    }
$employees = EmployeeDB::getEmployees();
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
	<link href="css/employee_list.css" rel="stylesheet" media="screen"/>
        
        <!--<link href="css/events_visual.css" rel="stylesheet" media="all"/>-->
        
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
            
            <aside id="empID">
                <h2>Employees: Demented Games</h1>

                <ul id="empList">
                    <?php foreach ($employees as $employee) : ?>
                    <li>
                        <a>
                            <?php echo $employee->getLastName() . ', ' . $employee->getFirstName() ; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </aside>

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