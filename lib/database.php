<?php 

class Database {

    public static function getConnection() {
        try {   
            $db_connection = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";port=" . $_ENV['DB_PORT'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
            $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            return $db_connection;
        } catch (PDOException $e) {
            echo "There was a problem while trying to connect to the database";
            if ($_ENV['ENV'] == 'development') {
                echo "<br> Error: " . $e->getMessage();
            }
            die("<br> Please check the database settings in config.php");
        }
        
    }

}

?>