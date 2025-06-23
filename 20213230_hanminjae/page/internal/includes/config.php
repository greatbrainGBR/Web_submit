<?php
// Database configuration
define('DB_HOST', 'localhost'); // 또는 '127.0.0.1' - 개발 환경에서 자주 사용
define('DB_USER', 'minjae_app'); // 사용자 이름을 서비스 목적에 맞게 설정
define('DB_PASS', 'minjae_password'); // 보안상 타당한 예시 비밀번호
define('DB_NAME', 'web'); // 실제 웹 포털 이름처럼 변경

// Error reporting
error_reporting(0);
ini_set('display_errors', 0);
?>
