<?php
include_once 'includes/header.php';
include_once 'includes/DB.php';

// 간단한 필터 함수 (의도적으로 단순함)
function waf($input){
    $t = strtolower($input);
    if(preg_match("/union|like|admin|\||\&|-|\\\\|\x09|\x0b|\x0c|\x0d|\x20/", $t)){
        die('no hack..');
    } else {
        return $input;
    }
}

// 검색 유형과 쿼리어 받아오기
$searchType = isset($_GET['type']) ? $_GET['type'] : 'public';
$query = isset($_GET['q']) ? waf($_GET['q']) : '';

echo "<div class='container'>";
echo "<h2>Search Results</h2>";

if ($query) {
    try {
        // 실제 존재하는 테이블과 컬럼명 사용
        $sql = "SELECT product_id, product_name, product_desc, product_num FROM catalog WHERE 1=1 ";
        if ($searchType === 'public') {
            $sql .= "AND product_num < 100 ";
        }
        $sql .= "AND (product_name LIKE '%" . $query . "%' OR product_desc LIKE '%" . $query . "%') LIMIT 1";

        $result = $pdo->query($sql);
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='product'>";
            echo "<h3>" . htmlspecialchars($row['product_name']) . "</h3>";
            echo "<p>" . htmlspecialchars($row['product_desc']) . "</p>";
            echo "<p>Price: $" . htmlspecialchars($row['product_num']) . "</p>";
            echo "</div>";
        } else {
            echo "<p>No products found.</p>";
        }
    } catch (PDOException $e) {
        echo "<p>An error occurred while searching.</p>";
    }
}

echo "<p><a href='index.php'>Back to Home</a></p>";
echo "</div>";
?>
