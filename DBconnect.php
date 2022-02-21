<?php
class DB_Connect{

    private static ?PDO $pdo = null;
    private static string $dsn = "mysql:host=%s;dbname=%s;charset=%s";

    public static function dbConnect(): PDO {
        if (self::$pdo === null) {
            try {
                $dsn = sprintf(self::$dsn, Config::DB_HOST, Config::DB_NAME, Config::DB_CHARSET);
                self::$pdo = new PDO($dsn, Config::DB_USERNAME, Config::DB_PASSWORD);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                die();
            }
        }




        return self::$pdo;
    }

}