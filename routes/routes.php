<?php

require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/EventController.php';
require_once '../app/controllers/SpeakerController.php';

require_once '../config/database.php'; 
require_once 'Router.php';

// Kết nối tới cơ sở dữ liệu
$dbConnection = Database::connect();

// Tạo các controller với kết nối cơ sở dữ liệu
$authController = new AuthController();
$eventController = new EventController($dbConnection);
$speakerController = new SpeakerController($dbConnection);


$router = new Router();


$router->get('/public/auth/google/login', [$authController, 'login']);
$router->get('/public/auth/google/callback', [$authController, 'callback']);
$router->get('/public/login', [$authController, 'showLoginForm']);
$router->get('/public/register', [$authController, 'register']);
$router->get('/public/dashboard', function () {
    session_start();
    if (isset($_SESSION['user'])) {
        include '../app/views/dashboard.php';
    } else {
        header('Location: /public/login');
        exit;
    }
});

$router->post('/public/logout', function () {
    session_start();
    session_destroy();
    header('Location: /public/login');
    exit;
});

// Event routes
$router->get('/public/manager-events', [$eventController, 'index']);
$router->get('/public/events/create', [$eventController, 'create']);
$router->post('/public/events/store', [$eventController, 'store']);
$router->get('/public/events/edit/{id}', [$eventController, 'edit']);
$router->post('/public/events/update/{id}', [$eventController, 'update']);
$router->get('/public/events/delete/{id}', [$eventController, 'delete']);


//Speaker
$router->get('/public/manager-speakers', [$speakerController, 'index']);
$router->get('/public/speakers/create', [$speakerController, 'create']);
$router->post('/public/speakers/store', [$speakerController, 'store']);
$router->get('/public/speakers/edit/{id}', [$speakerController, 'edit']);
$router->post('/public/speakers/update/{id}', [$speakerController, 'update']);
$router->get('/public/speakers/delete/{id}', [$speakerController, 'delete']);
