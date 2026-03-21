<?php
header('Content-Type: application/json'); // Header for AJAX

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/sign_up_logic.php";

try {
    $full_name = trim($_POST["full_name"]); // Remove begin and end white space 
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate input
    if (strlen($full_name) == 0 || strlen($email) == 0 || strlen($password) < 8) {
        echo json_encode(["success" => false, "message" => "Invalid input data."]);
        exit;
    }

    // Checking user already registered or not?
    if (userExist($pdo, $email)) {
        echo json_encode(["success" => false, "message" => "Email already registered."]);
        exit;
    }

    // Create a new user and save in database
    createUser($pdo, $full_name, $email, password_hash($_POST["password"], PASSWORD_DEFAULT));
    echo json_encode(["success" => true, "message" => "Create account successfully."]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Internal server error: " . $e->getMessage()]);
}