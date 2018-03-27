<div class="list">
    <a href="page/doneList.php" id="link1">Выполненые задания</a>
    <h1 class="header">To-do List.</h1>

    <?php if (!empty($items)): ?>
        <ul class="items">
            <?php foreach ($items as $item): ?>
                <li class="list_<?= $item['id']; ?>">
                    <input type="checkbox" value="<?= $item['id'] ?>" <?= ($item['done']) ? 'checked' : '' ?>>
                    <span class="item<?php echo $item['done'] ? 'done' : '' ?>"><?php echo $item['name'] ?></span>

                    <?php if (!$item['done']) { ?>
                        <span class="done-button list_id_<?= $item['id']; ?>">Задание не выполнено</span>
                    <?php } else { ?>
                        <span class="done-button list_id_<?= $item['id']; ?>">Задание выполнено</span>
                    <?php } ?>

                    <a href="#" title="Редактировать" attribute="<?= $item['id']; ?>" class="edit_link">E</a>
<br/>
                    <a href="#" title="Удалить" attribute="<?= $item['id']; ?>" class="delete_link">D</a>

                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>У Вас пока нету заданий ;(</p>
    <?php endif ?>

    <form class="item-add" action="../system/add.php" method="post">
        <input type="text" name="name" placeholder="Напишите новое задание..." class="input" autocomplete="off" required>
        <input type="hidden" name="id" id="elem_edit_id" value="">
        <input type="submit" value="Сохранить" class="submit">
    </form>

    <div id="message"></div>
</div>