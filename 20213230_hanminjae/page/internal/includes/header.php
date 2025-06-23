
<?php
// 세션 시작
session_start();

// 현재 사용자가 관리자(admin)인지 확인
function isAdmin(): bool {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

// FileIncluder 등에서 헤더 출력을 생략할 수 있도록 설정
$shouldRenderHeader = !isset($GLOBALS['SKIP_HEADER']);

if ($shouldRenderHeader):
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>20213230 한민재</title>
    <link rel="stylesheet" href="/page/internal/css/style.css">
</head>
<body>
    <div class="header">
        <img src="/page/internal/download.php?file=logo.png" alt="">
    </div>
<?php endif; ?>
