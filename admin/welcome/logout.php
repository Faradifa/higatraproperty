<?php
session_start();

// Regenerasi ID sesi untuk keamanan
session_regenerate_id(true);

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Hapus cookie sesi secara manual
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redirect ke halaman login setelah logout
header("Location: ../../home-login.php");
exit();
