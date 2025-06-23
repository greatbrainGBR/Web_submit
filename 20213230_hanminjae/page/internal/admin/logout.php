<?php
session_start();

// 모든 세션 변수 해제
$_SESSION = [];

// 세션 쿠키 삭제 (클라이언트 측도 초기화)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 세션 자체 파괴
session_destroy();

// 리디렉션
header("Location: /page/internal/index.php");
exit();
