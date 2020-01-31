<?php
$dsn = 'mysql:host=localhost;dbname=dementeddesign';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                /* include('database_error.php'); */
                echo "DB Error: " . $error_message; 
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
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the Manage Contact Info page
include('manage_contact_info.php');