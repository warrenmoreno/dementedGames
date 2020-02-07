<?php
    function getEmployee() {
      global $db;  
      $query = 'SELECT employeeID, firstName From employee '
              . 'ORDER BY employeeID';
                $statement = $db->prepare($query);
                $statement->execute();
                $employees = $statement;
                return $employees;
    }
    
?>
