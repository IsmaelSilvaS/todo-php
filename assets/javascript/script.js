console.log("Versão do jQuery: " + $.fn.jquery);

$(document).ready(function(){
    $('.edit-button').on('click', function(){
        var $task = $(this).closest('.task');
        $task.find('.progresso').addClass('hidden');
        $task.find('.task-descricao').addClass('hidden');
        $task.find('.task-actions').addClass('hidden');
        $task.find('.edit-task').removeClass('hidden');
    });

    $('.progresso').on('change', function() {
        console.log("Evento change disparado");
    
        const id = $(this).data('task-id');
        const completed = $(this).is(':checked') ? 1 : 0;
    
        console.log("ID da tarefa: " + id);
        console.log("Status completado: " + completed);
    
        $.ajax({
            url: './actions/update-progress.php', 
            method: 'POST',
            data: {id: id, completed: completed},
            dataType: 'json',
            success: function(response) {
                console.log(response); 
                if (response.success) {
                    console.log('Tarefa atualizada com sucesso');
                } else {
                    alert('Erro ao editar a tarefa');
                }
            },
            error: function() {
                alert('Ocorreu um erro.');
            }
        });
    });    
});

