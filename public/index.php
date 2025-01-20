<?php

// Bật hiển thị lỗi trong môi trường phát triển
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Định nghĩa đường dẫn cơ bản (base path)
define('BASE_PATH', dirname(__DIR__));

// Autoload các thư viện (như Google API Client)
require_once BASE_PATH . '/vendor/autoload.php';

// Gọi file định tuyến
require_once BASE_PATH . '/routes/routes.php';



// Khởi chạy router
$router->resolve($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
