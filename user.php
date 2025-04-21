<?php
require_once 'db.php';
require_once 'auth.php';

class User {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAll() {
        $conn = $this->db->connect();
        $stmt = $conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getById($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function create($name, $email, $password) {
        $auth = new Auth();
        return $auth->register($name, $email, $password);
    }
    
    public function update($id, $name, $email) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email
        ]);
    }
    
    public function delete($id) {
        $conn = $this->db->connect();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>