<?php
// config/database.php

class DBModel {
    private $conn;

    public function __construct() {
        $host   = 'localhost';
        $dbname = 'gifthub';
        $user   = 'root';
        $pwd    = ''; 

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $user, $pwd, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            // En cas d’erreur, on affiche et on arrête
            echo 'Connection error: ' . $e->getMessage();
            exit;
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
