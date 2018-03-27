<?php
include('init.php');


/**
 * Если у нас POST запрос удаляем запись
 */
if ($_POST['id']) {
    $id = (int)$_POST['id'];
    deleteElement($id);
}

/**
 * Удаляем по id запись
 * @param int $id записи в базе данных
 */
function deleteElement($id)
{
    $link = connect();

    $query = "DELETE FROM items WHERE id = $id";
    $result = mysqli_query($link, $query);

    if ($result) {
        $msg = [
            'status' => 'success',
            'msg' => 'delete item id = ' . $id,
        ];

        echo json_encode($msg);
    }
}
