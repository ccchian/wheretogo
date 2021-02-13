<?php

class Dbh
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "password";
    private $dbName = "gowhere";

    protected function connect()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=gowhere', $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //echo "success";
            return $pdo;
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
