<?php 

class User {

    const TABLENAME = 'users';

    private $db_connection;
    public $id;
    public $username;
    private $password;
    public $email;
    

    public function __construct() {
        $this->db_connection = Database::getConnection();
    }


    public static function create($username, $password, $email) {
        
        if( self::isExistEmail($email) ) {
            return 'This email has been already used. Please use another one.';
        }

        if( self::isExistUsername($username) ) {
            return 'This username has been already used. Please use another one.';
        }


        $username = htmlspecialchars(strip_tags($username));
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO " . self::TABLENAME . " (username, password, email) VALUES (:username, :password, :email)";

        $db_connection = Database::getConnection();
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return self::getById($db_connection->lastInsertId());
    }

    

    public function fromDB($rows) {
        $this->id = $rows['id'];
        $this->username = $rows['username'];
        $this->password = $rows['password'];
        $this->email = $rows['email'];
        return $this;
    }

    public static function getById($id) {

        $db_connection = Database::getConnection();
        $sql = "SELECT * FROM " . self::TABLENAME . " WHERE id = :id";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return (new User())->fromDB($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public static function getByEmail($email) {

        $db_connection = Database::getConnection();
        $sql = "SELECT * FROM " . self::TABLENAME . " WHERE email = :email";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return (new User())->fromDB($stmt->fetch(PDO::FETCH_ASSOC));
    }

    public static function getByUsername($username) {

        $db_connection = Database::getConnection();
        $sql = "SELECT * FROM " . self::TABLENAME . " WHERE username = :username";
        $stmt = $db_connection->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return (new User())->fromDB($stmt->fetch(PDO::FETCH_ASSOC));
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

    public function verifyPassword($password) {
        if(self::isExistUsername($this->username))
            return password_verify($password, $this->password);
        else return false;
    }

    public static function validation($username, $password, $email) {
        
        $validation = [];

        if( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            $validation['email'] = 'Invalid email format';
        } else if ( self::isExistEmail($email) ) {
            $validation['email'] = 'This email has been already used.';
        }

         if ( !preg_match('/^[a-zA-Z0-9]+$/', $username) ) {
            $validation['username'] = 'Username must be english characters and numbers only';
        } else if( strlen($username) < 5 ) {
            $validation['username'] = 'Username must be at least 5 characters';
        } else if ( strlen($username) > 20 ) {
            $validation['username'] = 'Username must be at most 20 characters';
        }
        
        else if ( self::isExistUsername($username) ) {
            $validation['username'] = 'This username has been already used.';
        }

        if( strlen($password) < 8 ) {
            $validation['password'] = 'Password must be at least 8 characters';
        }

        return $validation;
    }


}