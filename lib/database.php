<?php 

class Database {

    private static $db_host = $_ENV['DB_HOST'];
    private static $db_name = $_ENV['DB_NAME'];
    private static $db_user = $_ENV['DB_USER'];
    private static $db_pass = $_ENV['DB_PASS'];
    private static $db_port = $_ENV['DB_PORT'];
    private $db_connection = null;

    public static function getConnection() {

        self::$db_connection = new PDO("mysql:host=" . self::$db_host . ";dbname=" . self::$db_name . ";port=" . self::$db_port, self::$db_user, self::$db_pass);
        self::$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$db_connection;
    }

}

?>