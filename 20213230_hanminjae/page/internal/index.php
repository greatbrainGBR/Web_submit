<?php
require_once 'includes/header.php';
?>
<div class="container">
    <h1>내부 포털을 잘 찾아오셨군요</h1>
    <p>이 페이지는 내부용 웹사이트입니다.</p>
    <p>어떤 방법을 이용하면 소스코드를 leak할 수 있을 것 같네요.</p>

    <?php if (isAdmin()): ?>
        <p><a href="/admin/">[관리자 패널로 이동]</a></p>
    <?php endif; ?>

    <section class="search-box">
        <h2>제품 검색</h2>
        <form action="search.php" method="GET">
            <input type="text" name="q" placeholder="검색어를 입력하세요..." required>
            <input type="submit" value="검색">
        </form>
    </section>
</div>

</body>
</html>
