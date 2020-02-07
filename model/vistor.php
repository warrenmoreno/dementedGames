<?php
    function getVisitor() {
     global $db;
     global $employee_id;
     $query2 = 'SELECT * FROM vistor '
                    . 'WHERE employeeID = :employeeID'
                    . ' ORDER BY vistorEmail;';
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":employeeID", $employee_id);
            $statement2->execute();
            $vistor = $statement2;
            return $vistor;
    }       
    
?>
