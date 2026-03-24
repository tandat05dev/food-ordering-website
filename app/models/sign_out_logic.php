<?php
function deleteRefreshToken($pdo, $hash_token) {
    $stmt = $pdo->prepare("DELETE FROM `REFRESH_TOKEN` WHERE hash_token = :hash_token");
    return $stmt->execute([':hash_token' => $hash_token]);
}

function destroySession() {
    $_SESSION = array();

    // Delete default cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 1,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Destroy session
    session_destroy();
}