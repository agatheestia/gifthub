<?php
// model/User.php
require_once __DIR__ . '/../config/database.php';

class User {
    private $db;

    public function __construct() {
        // Instancie DBModel et récupère la connexion PDO
        $this->db = (new DBModel())->getConnection();
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function findByUsername(string $username): ?array {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): int {
        $sql = "INSERT INTO users
                (last_name, first_name, username, email, password, created_at)
                VALUES
                (:last_name, :first_name, :username, :email, :password, NOW())";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'last_name'  => $data['last_name'],
            'first_name' => $data['first_name'],
            'username'   => $data['username'],
            'email'      => $data['email'],
            'password'   => $data['password'],
        ]);

        return (int)$this->db->lastInsertId();
    }
}
