<!-- 

Original Author: Warren Moreno
Date Created: January 31, 2020
Version: LiveVersion0.1
Date Last Modified: February 07th, 2020
Modified by: Warren Moreno
Modification log 2-31-2020: added lastName to SELECT, 
Filename: employee.php

-->
<?php
    function getEmployee() {
      global $db;  
      $query = 'SELECT * FROM employee
               ORDER BY employeeID';
                $statement = $db->prepare($query);
                $statement->execute();
                $employees = $statement;
                return $employees;
    }
    
?>
