-- 데이터베이스 생성 및 선택
CREATE DATABASE IF NOT EXISTS web;
USE web;

-- 사용자 테이블 생성
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE
);

-- 상품 테이블 생성 (기존 catalog 유지)
CREATE TABLE catalog (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_desc TEXT,
    product_num DECIMAL(10,2)
);

-- 관리자 계정 추가 (비밀번호: minjae1234 → SHA1)
INSERT INTO users (username, password, is_admin) 
VALUES ('admin', '8d2789c936092011373f8ba496e01a8323d6f42e', TRUE);

-- 검색 대상 항목들 추가
INSERT INTO catalog (product_name, product_desc, product_num) VALUES
('1번 항목', '1번 항목입니다', 1.00),
('2번 항목', '2번 항목입니다', 2.00),
('숨겨진 항목', '접근 권한 확인', 999.99);

-- 접근 계정 생성 및 권한 부여
CREATE USER IF NOT EXISTS 'minjae_app'@'localhost' IDENTIFIED BY 'minjae_password';
GRANT ALL PRIVILEGES ON web.* TO 'minjae_app'@'localhost';
FLUSH PRIVILEGES;
