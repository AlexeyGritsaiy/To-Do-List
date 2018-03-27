<?php
include('init.php');


/**
 * Если у нас POST устанавливаем статус задания
 */
if ($_POST['id']) {
    $id = (int)$_POST['id'];
    setDone($id);
}

/**
 * Устанавливаем статус "Выполнено", если задание в списке работ
 * или снимаем статус "Выполнено"
 * @param int $id номер записи в базе данных
 */
function setDone($id)
{
    $link = connect();

    $queryIsSet = "SELECT * FROM items WHERE id = $id LIMIT 1";
    $resultIsSet = mysqli_query($link, $queryIsSet);

    if ($resultIsSet->num_rows) {

        $row = mysqli_fetch_assoc($resultIsSet);

        $status = null;

        switch ($row['done']) {
            case 0:
                $status = 1;
                break;
            case 1:
                $status = 0;
                break;
            default:
                $status = 1;
        }

        $query = "UPDATE items SET done = $status WHERE id = $id";
        $result = mysqli_query($link, $query);

        if (!$result) {
            echo json_encode(mysqli_connect_error());
        } else {

            $msg = [
                'value' => $status,
                'status' => 'success',
                'msg' => ($status) ? 'Задание выполнено' : 'Задание не выполнено',
            ];

            echo json_encode($msg);
        }
    }

}
