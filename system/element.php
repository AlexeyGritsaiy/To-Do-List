<?php
include('init.php');


/**
 * Если у нас POST запрос получаем запись по id
 */
if ($_POST['id']) {
    $id = (int)$_POST['id'];
    getElement($id);
}

/**
 * Получение с базы данных одной записи
 * @param int $id номер записи в базе данных
 */
function getElement($id)
{
    $link = connect();

    $query = "SELECT * FROM items WHERE id = $id LIMIT 1";
    $result = mysqli_query($link, $query);

    if ($result->num_rows) {

        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            echo json_encode(mysqli_connect_error());
        } else {

            $msg = [
                'value' => $row,
                'status' => 'success',
            ];

            echo json_encode($msg);
        }
    }
}
