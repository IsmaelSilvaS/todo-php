<?php
    require_once('./database/conn.php');
    $tasks = [];
    $sql = $pdo->query("SELECT * FROM to_do_t ORDER BY id ASC");
    if($sql->rowCount() > 0){
        $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>To do list</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div id="to_do">
        <h1>Coisas para fazer</h1>
        <form action="./actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="descricao" placeholder="Escreva sua atividade aqui" required>
            <button class="form-button" type="submit">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
            <?php foreach($tasks as $task):?>
                <div class="task">
                    <input type="checkbox" data-task-id="<?= $task['id']?>" name="progresso" class="progresso <?= $task['completed'] ? 'done' : ''?>" <?= $task['completed'] ? 'checked' : ''?> >

                    <p class="task-descricao">
                        <?= $task['description']?>
                    </p>

                    <div class="task-actions">
                        <a class="action-button edit-button">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="./actions/delete.php?id=<?=$task['id']?>" class="action-button delete-button">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>

                    <form action="./actions/update.php" method="POST" class="to-do-form edit-task hidden">
                        <input type="text" class="hidden" name="id" value="<?=$task['id']?>">
                        <input type="text" name="descricao" placeholder="Editar esta task" value="<?=$task['description']?>">
                        <button type="submit" class="form-button confirm-button">
                            <i class="fa-regular fa-check"></i>
                        </button>
                    </form>
                </div>
            <?php endforeach;?>
        </div>
    </div>

    <script src="./assets/javascript/script.js"></script>
</body>
</html>