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
            var_dump($success);
        } else {
            return $stmt->fetchAll();
            var_dump($success);
        }
    }
}
?>