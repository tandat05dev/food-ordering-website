<?php
// Checking user already existed ?
function userExist($pdo, $email) {
    $stmt = $pdo->prepare("SELECT id from `USER` WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch() ? true : false;
}
// Create a new user
function createUser($pdo, $full_name, $email, $password) {
    $stmt = $pdo->prepare("INSERT INTO `USER`(display_name, email, password) VALUES(?, ?, ?)");
    $stmt->execute([$full_name, $email, $password]);
}