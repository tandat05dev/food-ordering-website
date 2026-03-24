<?php
session_start();
header("Content-Type: application/json");

require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../models/sign_out_logic.php";

# Note: The website allows to max 3 devices
try {
    $remember_token = isset($_COOKIE["remember_me"]);

    if ($remember_token) {
        $cookie_token = $_COOKIE["remember_me"];
        $hash_token = hash('sha256', $cookie_token);
        // Delete refresh token in database
        deleteRefreshToken($pdo, $hash_token);
        // Set custom cookie in the past
        setcookie("remember_token", "", time() - 1, "/", false, true);
    }    

    // Destroy session
    destroySession();

    header("Location: /food-ordering-website/app/views/sign_in.php");
    exit();
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Internal server error: " . $e->getMessage()]);
}