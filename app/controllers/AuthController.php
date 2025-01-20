<?php

require_once '../vendor/autoload.php';
require_once '../app/models/UserModel.php';

class AuthController {

    private $config;

    public function __construct() {
        // Khởi tạo cấu hình Google khi tạo đối tượng
        $this->config = include dirname(__DIR__, 2) . '/config/google.php';
        if (!$this->config) {
            die('Cấu hình Google không hợp lệ!');
        }
    }

    public function showLoginForm() {
        include __DIR__ . '/../views/auth/login.php';
    }
    public function register() {
        include __DIR__ . '/../views/auth/register.php';
    }

    public function login() {
        $client = new Google_Client();
        $client->setClientId($this->config['client_id']);
        $client->setClientSecret($this->config['client_secret']);
        $client->setRedirectUri($this->config['redirect_uri']);
        $client->addScope('email');
        $client->addScope('profile');

        $authUrl = $client->createAuthUrl();
        header('Location: ' . $authUrl);
        exit;
    }

    public function callback() {
        $client = new Google_Client();
        $client->setClientId($this->config['client_id']);
        $client->setClientSecret($this->config['client_secret']);
        $client->setRedirectUri($this->config['redirect_uri']);

        $code = $_GET['code'] ?? null;

        if ($code) {
            $token = $client->fetchAccessTokenWithAuthCode($code);
            $client->setAccessToken($token);

            $googleService = new Google_Service_Oauth2($client);
            $googleUser = $googleService->userinfo->get();

            $userModel = new UserModel();
            $user = $userModel->findOrCreateUser([
                'google_id' => $googleUser->id,
                'email' => $googleUser->email,
                'name' => $googleUser->name,
            ]);

            session_start();
            $_SESSION['user'] = $user;

            header('Location: /public/dashboard');
            exit;
        }
    }
}
