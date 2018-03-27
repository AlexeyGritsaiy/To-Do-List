$(document).ready(function () {

    showMessage(false);

    $("input[type='checkbox']").change(function () {

        var id;
        id = this.value;

        $.ajax({
            type: "POST",
            url: "/system/mark.php",
            data: "id=" + id,
            success: function (rez) {

                var data;
                data = JSON.parse(rez);

                if (data.status === 'success') {
                    showMessage(true, 'Статус обновлен');

                    var listClass = '.list_id_' + id;

                    $(listClass).html(data.msg);

                } else {
                    showMessage(true, 'Произошла ошибка при сохранении, попробуйте еще раз.');
                }

                setTimeout(function () {
                    showMessage(false);
                }, 2000);
            }
        });
    });

    /**
     * Редактирование
     */
    $('.edit_link').click(function (e) {
        e.preventDefault();

        var id = $(this).attr('attribute');

        $.ajax({
            type: "POST",
            url: "/system/element.php",
            data: "id=" + id,
            success: function (rez) {

                var data;
                data = JSON.parse(rez);

                if (data.status === 'success') {

                    $("input[type='text']").val(data.value.name);
                    $("input[type='submit']").val('Редактировать');

                    $('#elem_edit_id').val(data.value.id);

                } else {
                    showMessage(true, 'Произошла ошибка при сохранении, попробуйте еще раз.');
                }

                setTimeout(function () {
                    showMessage(false);
                }, 2000);
            }
        });

    });

    /**
     * Удаление
     */
    $('.delete_link').click(function (e) {
        e.preventDefault();

        var id = $(this).attr('attribute');

        $.ajax({
            type: "POST",
            url: "/system/delete.php",
            data: "id=" + id,
            success: function (rez) {

                var data;
                data = JSON.parse(rez);

                if (data.status === 'success') {
                    showMessage(true, 'Запись успешно удалена');

                    var listClass = '.list_' + id;

                    $(listClass).hide();

                } else {
                    showMessage(true, 'Произошла ошибка при сохранении, попробуйте еще раз.');
                }

                setTimeout(function () {
                    showMessage(false);
                }, 2000);
            }
        });
    });

});

function showMessage(show, text) {

    if (show) {
        $('#message').html(text).show();
    }
    else {
        $('#message').hide();
    }
}