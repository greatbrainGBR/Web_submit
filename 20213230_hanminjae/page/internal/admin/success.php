<?php
session_start();

// 관리자 여부 확인
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    // 로그인 안 된 사용자면 로그인 페이지로 리디렉션
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>축하합니다!</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5rem;
        }

        p {
            margin-top: 1rem;
            font-size: 1.2rem;
            color: #555;
        }

        .button {
            margin-top: 2rem;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>🎉 축하합니다! 🎉</h1>
        <p>문제를 성공적으로 해결하셨습니다.</p>
        <a href="logout.php" class="button">로그아웃</a>

    </div>
</body>
</html>
