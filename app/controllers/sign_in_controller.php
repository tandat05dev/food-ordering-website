<?php
session_start();
header("Content-Type: application/json");

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/sign_in_logic.php";

try {
    $email = trim($_POST["email"]) ?? '';
    $password = $_POST["password"] ?? '';
    $remember_me = isset($_POST["checkbox"]); // isset() will return true or false

    // Validate input
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format."]);
        exit;
    }

    if (strlen($password) < 8) {
        echo json_encode(["success" => false, "message" => "Password length must be at least 8 characters."]);
        exit;
    }

    $user = validateUser($pdo, $email);
    
    // Checking user existed
    if (!$user) {
        echo json_encode(["success" => false, "message" => "Can not find user."]);
        exit;
    }
    
    // Checking correct password
    if (!password_verify($password, $user["password"])) {
        echo json_encode(["success" => false, "message" => "Password is not correct."]);
        exit;
    }

    // Create a new session including id name and role
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["display_name"] = $user["display_name"];
    $_SESSION["role"] = $user["role"];

    // Update last login
    updateLastLogin($pdo, $user["id"]);

    // Store refresh_token
    if ($remember_me) {
        $cookie_token = bin2hex(random_bytes(32)); // raw_token
        $hash_token = hash('sha256', $cookie_token); // hash token

        if (storeRefreshToken($pdo, $user["id"], $hash_token)) {
            // In production env (https) secure = true
            setcookie("remember_token", $cookie_token, time() + (86400 * 7), "/", "", false, true);
        };
    }

    echo json_encode(["success" => true, "message" => "Sign in successfully."]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Internal server error: " . $e->getMessage()]);
}