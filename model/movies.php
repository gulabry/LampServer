<?php 
class Movies {
    protected $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function search($q) {
        $sql = 'select * from movies m where m.title like ?';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array("%".$q."%"));

        if (!$success) {
            trigger_error($stmt->errorInfo());

        } else {
            return $stmt->fetchAll();
        }
    }
    
    public function findByMovieId($name) {
        $sql = 'select * from movies m where m.imdb_id = ?';
        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(array($name));
        if (!$success) {
            trigger_error($stmt->errorInfo());

        } else {
            return $stmt->fetchAll();
        }
    }
}
?>