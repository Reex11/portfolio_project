<?php 

class Experience {

    const TABLENAME = 'experiences';
    private $db_connection;
    public $id;
    public $title;
    public $type;
    public $company;
    public $location;
    public $start_date;
    public $end_date;
    public $description;

    public function __construct() {
        $this->db_connection = Database::getConnection();
    }

    public static function all() {
        $sql = "SELECT * FROM " . self::TABLENAME;
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create() {
        $sql = "INSERT INTO " . self::TABLENAME . " (title, type, company, location, start_date, end_date, description) VALUES (:title, :type, :company, :location, :start_date, :end_date, :description)";

        $stmt = $this->db_connection->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':end_date', $this->end_date);
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();

        return $this->getById($this->db_connection->lastInsertId());
    }

    public function getById($id) {

        $sql = "SELECT * FROM " . self::TABLENAME . " WHERE id = :id";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    


}