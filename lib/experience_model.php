<?php 

require_once 'database.php';

class Experience {

    private $db_connection;
    private $db_table = 'experiences';
    public $id;
    public $title;
    public $company;
    public $location;
    public $start_date;
    public $end_date;
    public $description;

    public function __construct() {
        $this->db_connection = Database::getConnection();
    }


    public function create() {
        $sql = "INSERT INTO " . $this->db_table . " (title, company, location, start_date, end_date, description) VALUES (:title, :company, :location, :start_date, :end_date, :description)";

        $stmt = $this->db_connection->prepare($sql);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':company', $this->company);
        $stmt->bindParam(':location', $this->location);
        $stmt->bindParam(':start_date', $this->start_date);
        $stmt->bindParam(':end_date', $this->end_date);
        $stmt->bindParam(':description', $this->description);
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
    


}