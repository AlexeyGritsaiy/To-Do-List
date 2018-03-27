<?php
include('items.php');


/**
 * Установление соединение с БД
 * @return mysqli|string
 */
function connect()
{
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'todo';

    $link = mysqli_connect($host, $user, $password, $db);

    mysqli_set_charset($link, 'utf8');

    if (!$link) {
        return mysqli_connect_error();
    }

    return $link;
}

/**
 * Форматирование даты с timestamp
 * @param $datetime
 * @return false|string
 */
function covertDateTime($datetime)
{
    $time = strtotime($datetime);
    return date("d/m/y H:i:s", $time);
}
