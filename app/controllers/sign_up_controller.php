<?php
session_start();
header('Content-Type: application/json'); // Header for AJAX

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/sign_up_logic.php";

try {
    $full_name = trim($_POST["full_name"]) ?? ''; 
    $email = trim($_POST["email"]) ?? '';
    $password = $_POST["password"] ?? '';
    $confirm_password = $_POST["confirm_password"] ?? '';

    // Validate input
    if (empty($full_name)) {
        echo json_encode(["success" => false, "message" => "Name is required."]);
        exit;
    }
        
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email format."]);
        exit;
    }

    if (strlen($password) < 8) {
        echo json_encode(["success" => false, "message" => "Password length must be at least 8 characters."]);
        exit;
    }

    if (strlen($confirm_password) < 8) {
        echo json_encode(["success" => false, "message" => "Confirm password length must be at least 8 characters."]);
        exit;
    }

    if (strlen($password) !== strlen($confirm_password)) {
        echo json_encode(["success" => false, "message" => "Confirm password and password length must be the same."]);
        exit;
    }

    // Checking user already registered or not?
    if (userExist($pdo, $email)) {
        echo json_encode(["success" => false, "message" => "Email already registered."]);
        exit;
    }

    // Create a new user and save in database
    $new_user_id = createUser($pdo, $full_name, $email, $password);

    if ($new_user_id) {
        // Create a new session including id name and role
        $_SESSION['user_id'] = $new_user_id;
        $_SESSION['display_name'] = $full_name;
        $_SESSION['role'] = 'CUSTOMER';
    }

    echo json_encode(["success" => true, "message" => "Create account successfully."]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Internal server error: " . $e->getMessage()]);
}