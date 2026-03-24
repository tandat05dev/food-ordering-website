<?php
// Checking user already existed ?
function userExist($pdo, $email) {
    $stmt = $pdo->prepare("SELECT id from `USER` WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    return $stmt->fetch();
}
// Create a new user
function createUser($pdo, $full_name, $email, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO `USER`(display_name, email, password) VALUES(:display_name, :email, :hash_password)"); // default will be customer and is active
    $stmt->execute([
        ':display_name' => $full_name,
        ':email' => $email,
        'hash_password' => $hashed_password
    ]);

    return $pdo->lastInsertId(); // Return id
}