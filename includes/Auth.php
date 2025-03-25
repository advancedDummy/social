<?php
require_once "User.php";

class Auth {
    private $user;

    public function __construct() {
        session_start();
        $this->user = new User();
    }

    public function login($email, $password): bool {
        $userData = $this->user->getUserByEmail($email);

        if($userData && password_verify($password, $userData['password_hash'])) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            return true;
        }
        return false;
    }

    public function logout(): void {
        session_destroy();
    }

    public function isAuthenticated(): bool {
        return isset($_SESSION['user_id']);
    }
}