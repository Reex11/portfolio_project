<?php 

class Message {

    const TABLENAME = 'messages';
    private $db_connection;
    public $id;
    public $title;
    public $body;
    public $sender_name;
    public $sender_email;
    public $created_at;

    public function __construct($title, $body, $sender_name, $sender_email) {
        $this->db_connection = Database::getConnection();
        $this->title = $title;
        $this->body = $body;
        $this->sender_name = $sender_name;
        $this->sender_email = $sender_email;
        
    }

    public static function all() {
        $sql = "SELECT * FROM " . self::TABLENAME;
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function save() {
        $sql = "INSERT INTO " . self::TABLENAME . " (title, body,sender_name, sender_email) VALUES (:title, :body, :sender_name, :sender_email)";

        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':sender_name', $this->sender_name);
        $stmt->bindParam(':sender_email', $this->sender_email);
        
        $stmt->execute();

        return $this->getById(Database::getConnection()->lastInsertId());
    }

    public function getById($id) {

        $sql = "SELECT * FROM " . self::TABLENAME . " WHERE id = :id";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    


}