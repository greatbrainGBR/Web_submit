<?php
// 에러 출력 (디버깅용)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 세션 시작
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// DB 연결
require_once '../includes/DB.php'; // $pdo 사용 가능
require_once '../includes/header.php'; // 헤더 구성

$error = '';

// 이미 로그인되어 있다면 바로 success 페이지로 리디렉션
if ($_SESSION['is_admin'] ?? false) {
    header('Location: success.php');
    exit();
}

// 로그인 시도 처리
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND is_admin = 1");
    $stmt->execute([$username, sha1($password)]);

    if ($user = $stmt->fetch()) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = true;
        header('Location: success.php');
        exit();
    } else {
        $error = '잘못된 관리자 계정입니다.';
    }
}
?>

<!-- 로그인 HTML 폼 -->
<div class="container">
    <h2>관리자 로그인</h2>

    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="POST">
        <div>
            <label for="username">아이디:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">비밀번호:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <input type="submit" value="로그인">
        </div>
    </form>
</div>

</body>
</html>
