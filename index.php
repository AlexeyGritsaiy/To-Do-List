<?php
include('system/init.php');
//Установка getAllFromItems(0 или 1); - будет показывать нам задания которые выполнены или нет,где 0 - невыполненные , 1 - выполненные
//если значения не задавать - то в списке будут отображены все задания .
$items = getAllFromItems(0);
?>

<html>
<head>
    <title>To-Do List</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include('page/list.php'); ?>

</body>

<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/scripts.js"></script>

</html>
