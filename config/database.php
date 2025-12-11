<?php
class Database {
private $host = "localhost";
private $dbname = "universite_inscription";
private $username = "root";
private $password = ""; // sous WAMP par défaut
public $conn;


public function connect() {
$this->conn = null;


try {
$this->conn = new PDO(
"mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8mb4",
$this->username,
$this->password
);
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
die("Erreur de connexion : " . $e->getMessage());
}


return $this->conn;
}
}
?>