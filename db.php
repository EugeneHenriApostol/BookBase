<?php
// db.php

class DB {
    // database config
    private const HOST = "localhost";
    private const DB = 'bookbase';
    private const USER = 'root';
    private const PASSWORD = 'daggergaming1';

    private static ? self $instance = null;

    private PDO $pdo;

    // singleton accessor
    public static function get() : self {
        return self::$instance ??= new self();
    }

    private function __construct() {
        $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new PDO($dsn, self::USER, self::PASSWORD, $options);
    }

    // convenience methods
    public function row(string $sql, array $params = []): ?array {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch() ?: null;
    }

    
}