<?php

require_once('../database/conn.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$completed = filter_input(INPUT_POST, 'completed', FILTER_VALIDATE_INT);

if ($id !== false && ($completed === 0 || $completed === 1)) {
    $sql = $pdo->prepare("UPDATE to_do_t SET completed = :completed WHERE id = :id");
    $sql->bindValue(':completed', $completed, PDO::PARAM_INT);
    $sql->bindValue(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    echo json_encode(['success' => 1]);
    exit;
} else {
    echo json_encode(['error' => 0]);
    exit;
}
