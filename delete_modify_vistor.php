<!-- 

Original Author: Warren Moreno
Date Created: January 31, 2020
Version: LiveVersion0.1
Date Last Modified: February 07th, 2020
Modified by: Warren Moreno
Modification log 2-12-2020:  
Filename: delete_modify_vistor.php

-->
<?php
$dsn = 'mysql:host=localhost;dbname=dementeddesign';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage() . "<br>There was an issue accessing the database. <br>Please try again." ;
                include('./database_error.php');
                //echo "DB Error: " . $error_message;
                //$error = "There was an issue accessing the database. Please try again.";
                exit();
            }

// Get IDs
$employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);
$vistor_id = filter_input(INPUT_POST, 'vistor_id', FILTER_VALIDATE_INT);

// Delete the Visitor Info from the database
if ($employee_id != false && $vistor_id != false) {
     $query = 'DELETE FROM vistor
              WHERE vistorID = :vistor_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vistor_id', $vistor_id);
        //$success = $statement->execute();
        //$statement->closeCursor(); 
    
    try{
       $success = $statement->execute();
    } catch (Exception $ex) {
            $error_message = "There was an issue in deleting the data. Please try again.";
            //include('./database_error.php');     
    
    }
       
        $statement->closeCursor();
    if ($success < 1){
        include('./database_error.php');
        $error_message = "There was an issue in deleting the data. Please try again.";
    } 
}

// Display the Manage Contact Info page
include('manage_contact_info.php');