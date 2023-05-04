<?php


$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";

try {

    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);

} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}

// Получение данных из таблицы orders
$sql = "SELECT * FROM orders";
$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>список заказов</title>
</head>
<body>

<form action="d/create-order.php"><input type="text" name="create-order" id="">

    <input type="submit" value=""></form>

<table>
    <tr>
        <th>ID</th>
        <th>Покупатель</th>
        <th>Описание</th>
        <th>Общая стоимость</th>
        <th>Оплачено</th>
        <th>не оплачено</th>
        <th>Действия</th>
    </tr>
    <?php
    foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['id'] ?></td>
            <td><?= $order['customer_id'] ?></td>
            <td><?= $order['customer'] ?></td>
            <td><?= $order['description'] ?></td>
            <td><?= $order['total_cost'] ?></td>
            <td><?= $order['paid'] ?></td>
            <td><?= $order['not_paid'] ?></td>
            <td>
                <form method="get">
                    <a href='order.php?id=<?= $order['id'] ?>'>

                        Просмотреть Заказ
                    </a>
                </form>
            </td>

        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>





