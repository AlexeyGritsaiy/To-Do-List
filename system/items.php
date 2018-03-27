<?php


/**
 * Получение всех записей с базы данных
 * @param null $status статус записи
 * @return array|string
 */
function getAllFromItems($status = null)
{
    $link = connect();

    if ($status === null) {
        $query = 'SELECT * FROM items';
    } else {
        $query = 'SELECT * FROM items WHERE done = ' . $status;
    }

    $result = mysqli_query($link, $query);

    if (!$result) {
        return mysqli_connect_error();
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    return $data;
}