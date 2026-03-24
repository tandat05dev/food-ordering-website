<?php
function validateUser($pdo, $email) {
    $stmt = $pdo->prepare("SELECT id, display_name, role, password FROM `USER` WHERE email = :email LIMIT 1");
    $stmt->execute([':email' => $email]);
    return $stmt->fetch();
}

function updateLastLogin($pdo, $user_id) {
    $stmt = $pdo->prepare("UPDATE `USER` SET last_login_at = NOW() WHERE id = :id LIMIT 1");
    return $stmt->execute([':id' => $user_id]);
}

function storeRefreshToken($pdo, $user_id, $hash_token) {
    // Delete old refresh_token for optimized database
    // Cron jobs
    $stmt = $pdo->prepare("DELETE FROM `REFRESH_TOKEN` WHERE user_id = :user_id AND expires_at < NOW()");
    $stmt->execute(['user_id' => $user_id]);

    // Only have 3 refresh_token in database
    $stmt = $pdo->prepare(" DELETE FROM `REFRESH_TOKEN` 
                            WHERE user_id = :user_id
                            AND id NOT IN (
                                SELECT id FROM (
                                    SELECT id FROM `REFRESH_TOKEN
                                    WHERE user_id = :user_id
                                    ORDER BY expires_at DESC
                                    LIMIT 2
                                ) AS temp
                            )
                        ");
    $stmt->execute([':user_id' => $user_id]);
    
    // Insert new token
    $stmt = $pdo->prepare("INSERT INTO `REFRESH_TOKEN` (user_id, hash_token, expires_at) VALUES (:user_id, :hash_token, DATE_ADD(NOW(), INTERVAL 7 DAY))");
    return $stmt->execute([':user_id' => $user_id, 'hash_token' => $hash_token]);
}