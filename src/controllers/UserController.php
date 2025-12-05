<?php

Class UserController {
    private mysqli $db;

    public function __construct (mysqli $db) {
        $this->db = $db;
    }

    public function register (string $email, string $password): array{
        // sanitization
        
    }

    public function login(string $email, string $password): array {
        // sanitization
    }

    private function validatePassword(string $password): bool {
        // password rules here
        if (strlen($password) > 8 &&
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[^\w\s]/', $password)
        ) { return true; } 
        else { return false; }
    }
}

?>