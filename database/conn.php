<?php

$host = 'localhost';
$dbname = 'to_do';
$username = 'root';
$password = '';

try{
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}