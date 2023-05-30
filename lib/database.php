<?php 

class Database {

    public static function getConnection() {

        $db_connection = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";port=" . $_ENV['DB_PORT'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db_connection;
    }

}

?>