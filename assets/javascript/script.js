$(document).ready(function(){
    $('.edit-button').on('click', function(){
        var $task = $(this).closest('.task');
        $task.find('.progresso').addClass('hidden');
        $task.find('.task-descricao').addClass('hidden');
        $task.find('.task-actions').addClass('hidden');
        $task.find('.edit-task').removeClass('hidden');
    });

    $('.progresso').on('click', function(){
        if($(this).is(':checked')){
            $(this).addClass('done');
        }else{
            $(this).removeClass('done');
        }
    })
});