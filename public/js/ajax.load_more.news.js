$(document).ready(function(){

    $('#show_more').click(function(){
        var btn_more = $(this);
        var count_show = parseInt($(this).attr('count_show'));
        var count_add  = $(this).attr('count_add');
        btn_more.html('Подождите...');

        $.ajax({
            url: "news", // куда отправляем
            type: "post", // метод передачи
            dataType: "json", // тип передачи данных
            data: { // что отправляем
                "count_show":	count_show,
                "count_add":	count_add
            },
            // после получения ответа сервера
            success: function(data){
                if(data.result == "success"){
                    $('#news_content').append(data.html);
                    btn_more.val('Показать еще');
                    btn_more.attr('count_show', (count_show+3));
                }else{
                    btn_more.val('Больше нечего показывать');
                }
            }
        });
    });

});