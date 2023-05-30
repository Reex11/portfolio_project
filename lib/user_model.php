<?php 

require_once 'database.php';

class User {

    private $db_connection;
    private $db_table = 'users';
    public $id;
    public $username;
    private $password;
    private $email;
    

    public function __construct() {
        $this->db_connection = Database::getConnection();
    }


    public function create($username, $password, $email) {
        
        if( $this->isExistEmail($email) ) {
            return 'This email has been already used. Please use another one.';
        }

        if( $this->isExistUsername($username) ) {
            return 'This username has been already used. Please use another one.';
        }

        $username = htmlspecialchars(strip_tags($username));
        
        # securing the password
        $this->password = password_hash($password, 'helloworldthisisarandomsalt!');
        
        $sql = "INSERT INTO " . $this->db_table . " (username, password, email) VALUES (:username, :password, :email)";

        $stmt = $this->db_connection->prepare($sql);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        return $this->getById($this->db_connection->lastInsertId());
    }

    public function getById($id) {

        $sql = "SELECT * FROM " . $this->db_table . " WHERE id = :id";
        $stmt = $this->db_connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    
    public static function isExistEmail($email) {
        $db_connection = Database::getConnection();
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? true : false;
    }

    public static function isExistUsername($username) {
        $db_connection = Database::getConnection();
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? true : false;
    }

}