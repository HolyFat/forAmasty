<?php
ini_set('display_errors',1);
$host = 'localhost';
$db   = 'testbase';
$user = 'testname';
$pass = 'testpass';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true
];
$pdo = new PDO($dsn, $user, $pass, $opt);


function checkPersons($pdo){
    try{
        $sql = "SELECT * FROM `persons`";
        $pdo->query($sql);

        echo "Table persons exists";
    }
    catch(PDOException $e)
    {
        $sql = "CREATE TABLE persons (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    city_id VARCHAR(30) NOT NULL,
    fullname VARCHAR(30) NOT NULL
    )";
        $pdo->query($sql);
        echo "Table persons created successfully<br>";
    }
}

function checkTransactions($pdo){
    try{
        $sql = "SELECT * FROM `transactions`";
        $pdo->query($sql);

        echo "Table transactions exists<br>";
    }
    catch(PDOException $e)
    {
        $sql = "CREATE TABLE transactions (
    transaction_id INT(6) AUTO_INCREMENT PRIMARY KEY,
    from_person_id VARCHAR(30) NOT NULL,
    to_person_id VARCHAR(30) NOT NULL,
    amount FLOAT(30) NOT NULL
    )";
        $pdo->query($sql);
        echo "Table transactions created successfully<br>";
    }
}

function import($pdo){
    $dump = file_get_contents('dump.sql');

    $pdo->exec($dump);

    echo "Import was successfully<br>";
}

checkPersons($pdo);
checkTransactions($pdo);
import($pdo);






