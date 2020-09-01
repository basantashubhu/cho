<?php

$servername = 'localhost';
$database = 'blank';
$username = 'root';
$password = 'root';
$charset = 'utf8';
$dbPrefix = 'lsv_';
$pasPhrase = '';
$setVal = '';


$dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}