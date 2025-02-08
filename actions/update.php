<?php

require_once('../database/conn.php');

$descricao = filter_input(INPUT_POST, 'descricao');
$id = filter_input(INPUT_POST, 'id');

if($descricao){
    $sql = $pdo->prepare("UPDATE to_do_t SET description = :descricao WHERE id = :id");
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('Location: ../index.php');
    exit;
}else{
    header('Location: ../index.php');
    exit;
}