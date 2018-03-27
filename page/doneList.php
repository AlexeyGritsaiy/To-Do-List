<?php
include('../system/init.php');
$items = getAllFromItems(1);
?>

<html>
<head>
    <title>To-Do List</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
<div class="list">
    <h1 class="header">List of finished tasks</h1>
    <?php if (!empty($items)): ?>
        <ul class="items">
            <?php foreach ($items as $item): ?>
                <?php echo covertDateTime($item['created']); ?>

                <li class="list_<?= $item['id']; ?>">
                    <span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name'] ?></span>
                    <?php if ($item['done']) { ?>
                        <span
                            class="done-button list_id_<?= $item['id']; ?><?= $item['date'] ?>">Задание  выполнено</span>
                    <?php } ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>У Вас пока нету готовых заданий ;(</p>
    <?php endif ?>
</div>


</body>

<script src="../js/jquery-2.2.0.min.js"></script>
<script src="../js/scripts.js"></script>

</html>
