<?php
require_once "Database.php";

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function register($username, $email, $password): bool|string {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password)";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $hashedPassword
            ]);
            return true;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return "Użytkownik o tej nazwie lub adresie e-mail już istnieje."; //inna obsługa
            }
            return "Błąd rejestracji: ".$e->getMessage(); //inna obsługa
        }
    }

    public function getUserByEmail($email): false|array {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }
}