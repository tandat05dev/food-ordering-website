<?php
function validateUser($pdo, $email, $password, $remember_me) {
    $stmt = $pdo->prepare("SELECT id, display_name, role, password FROM `USER` WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user["password"])) {
        return false;
    }

    $stmt = $pdo->prepare("UPDATE `USER` SET last_login_at = NOW() WHERE id = ?");
    $stmt->execute([$user["id"]]);

    // Create session
    // edit php.init session.gc_maxlifetime for time auto delete session and
    // session.cookie_lifetime for close tab/window
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["display_name"] = $user["display_name"];
    $_SESSION["role"] = $user["role"];

    if ($remember_me) {
        $cookie_token = bin2hex(random_bytes(32));
        // Return cookie for client
        setcookie("cookie", $cookie_token, time() + (86400 * 7), "/", "", false, true); // In production env (https) secure = true

        // ------- Optimized database ------- //
        // Remove token which is existed over 7 days
        $stmt = $pdo->prepare("DELETE FROM `refresh_token` WHERE user_id = ? AND expires_at < NOW()");
        $stmt->execute([$user["id"]]);

        // each user have maximum 3 refresh_token
        $stmt = $pdo->prepare("
        DELETE FROM `refresh_token` 
        WHERE user_id = ? 
        AND id NOT IN (
            SELECT id FROM (
                SELECT id FROM `refresh_token` 
                WHERE user_id = ? 
                ORDER BY expires_at DESC
                LIMIT 2
            ) AS temp_table
        )
        ");
        $stmt->execute([$user["id"], $user["id"]]);

        // Store in refresh_token table
        $stmt = $pdo->prepare("INSERT INTO `refresh_token` (user_id, hash_token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$user["id"], hash('sha256', $cookie_token), date('Y-m-d H:i:s',time() + (86400 * 7))]);
    }

    return true;
}