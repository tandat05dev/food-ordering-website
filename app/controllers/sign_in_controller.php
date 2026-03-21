<?php
session_start();
header("Content-Type: application/json");

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/sign_in_logic.php";

try {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember_me = isset($_POST["checkbox"]);

    // Validate input
    if (strlen($email) == 0 || strlen($password) < 8) {
        echo json_encode(["success" => false, "message" => "Invalid input data."]);
        exit;
    }

    // Checking correct password
    if (!validateUser($pdo, $email, $password, $remember_me)) {
        echo json_encode(["success" => false, "message" => "Email hoặc mật khẩu không chính xác!"]);
        exit;
    }

    echo json_encode(["success" => true, "message" => "Đăng nhập thành công!"]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Internal server error: " . $e->getMessage()]);
}