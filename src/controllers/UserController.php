<?php

Class UserController {
    private mysqli $db;

    // Constructor
    public function __construct (mysqli $db) {
        $this->db = $db;
    }

    /**
     * Register user
     * Sanitize and validate email and password
     * 
     * @param string $email
     * @param string $password
     */
    public function register (string $email, string $password): array{
        // sanitization and validation 
        $email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ["success" => false, "message" => "Invalid email format"];
        }

        // Validate password
        if (!$this->validatePassword($password)) {
            return ["success" => false, "message" => "Password does not meet requirements"];
        }

        // Check duplicate email
        $check = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        $existing = $check->get_result();

        if ($existing->num_rows > 0) {
            return ["success" => false, "message" => "Email already registered"];
        }

        // Hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $sql = "INSERT INTO users (email, password_hash) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $email, $hash);

        if ($stmt->execute()) {
            return ["success" => true, "message" => "Registration successful"];
        }

        return ["success" => false, "message" => "Database error"];
    }

    /**
     * login user
     * 
     * @param string $email
     * @param string $password
     */
    public function login(string $email, string $password): array {
        // sanitization
        $email = trim(filter_var($email, FILTER_SANITIZE_EMAIL));

        $sql = "SELECT * FROM users WHERE email = ?;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        // Go over some checks here
        if (!$user) {
            return ["success" => false, "message" => "User not found"];
        }

        if (!password_verify($password, $user["password_hash"])) {
            return ["success" => false, "message" => "Invalid password"];
        }

        // Start session
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"]   = $user["email"];

        return ["success" => true, "message" => "Logged in!"];
    }

    /**
     * Logout user
     */
    public function logout(): void {
        session_start();
        session_unset();
        session_destroy();
    }

    /** 
     * Validate password strength
     * https://www.geeksforgeeks.org/php/how-to-validate-password-using-regular-expressions-in-php/ 
     * 
     * @param string $password
     * @return bool
     */
    private function validatePassword(string $password): bool {
        // password rules here
        return (
            strlen($password) >= 16 &&       
            preg_match('/\s/', $password) && 
            preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/[0-9]/', $password) &&
            preg_match('/[^A-Za-z0-9 ]/', $password)
        );
    }
}

?>