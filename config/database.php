<?php

return [
    'host' => 'localhost',
    'dbname' => 'event',
    'username' => 'root',
    'password' => '',
];
// Class để kết nối Database
class Database {
    private static $connection = null;

    public static function connect() {
        if (self::$connection === null) {
            $config = include __DIR__ . '/database.php';

            try {
                self::$connection = new PDO(
                    "mysql:host={$config['host']};dbname={$config['dbname']}",
                    $config['username'],
                    $config['password']
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
?>