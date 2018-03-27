<?php
include('init.php');


/**
 * Если у нас POST запрос добавляем новую запись
 */
if ($_POST['name']) {
    addNewItems($_POST);
}

/**
 * Добавление в базу новой записи
 * @param $add
 * @return string
 */
function addNewItems($add)
{
    $link = connect();

	/**
	* Проверка на существования ключа в массиве
	*/
	if(!isset($add['user'])) {
		$add['user'] = 1;
	}
		
	/**
	* Проверка на существования ключа в массиве
	*/
	if(!isset($add['done'])) {
		$add['done'] = 0;
	}
	
    $query = null;

    if ((int)$add['id']) {
        $query = "UPDATE items SET name = '" . $add['name'] . "', user = '" . $add['user'] . "', done = 0, created = now() WHERE id = '" . (int)$add['id'] . "'";
    } else {
        $query = "INSERT INTO items (name, user, done, created) VALUES ('" . $add['name'] . "', '" . $add['user'] . "', '" . $add['done'] . "', now())";
    }

    $result = mysqli_query($link, $query);

    if (!$result) {
        return mysqli_connect_error();
    } else {
        header('Location: ../index.php');
    }
}

/**
 * Debug
 * @param $data
 */
function prn($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}