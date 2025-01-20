<?php

require_once __DIR__ . '/../../config/database.php';

class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function findOrCreateUser($userData) {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE google_id = ?');
        $stmt->execute([$userData['google_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        }

        $stmt = $this->db->prepare('INSERT INTO users (google_id, email, name) VALUES (?, ?, ?)');
        $stmt->execute([
            $userData['google_id'],
            $userData['email'],
            $userData['name'],
        ]);

        $user['id'] = $this->db->lastInsertId();
        $user = array_merge($user, $userData);
        return $user;
    }
}
