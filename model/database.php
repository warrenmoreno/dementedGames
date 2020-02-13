<!-- 

Original Author: Warren Moreno
Date Created:  Jan 30th, 2020
Version: LiveVersion0.1
Date Last Modified: February 12th, 2020
Modified by: Warren Moreno
Modification log: updated error catch
Filename: database.php

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
                //$error_message = $e->getMessage();
                $error_message = "Your entry is having techincal issues.<br> Please upload again or attempt later." ;
                //return $error_message;
                include('./database_error.php');
                //include('./error.html');
                exit();
            }
        }
        return self::$db;
    }
}
?>