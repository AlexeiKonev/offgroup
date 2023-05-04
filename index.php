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

<form action="d/create-order.php">
    <input type="text" name="" >
    <input type="submit" ></form><label for="customerID">customerID</label>
<select id="customerID" name="customer_id">

    <option value=”1”>1</option>

    <option value=”2”>2</option>

</select>
<label for="descriptionID">description</label>
<select id="descriptionID" name="">

    <option value=”iphoneX”>iphoneX</option>

    <option value=”iphone”>iphone</option>

    <option value=”android”>android</option>

    <option value=”ipad”>ipad</option>

</select> <select id="selectID" name="">

    <option value=”iphoneX”>iphoneX</option>

    <option value=”iphone”>iphone</option>

    <option value=”android”>android</option>

    <option value=”ipad”>ipad</option>

</select> <label for="total_cost">Стоимость</label><input type="text" name="total_cost" id="total_cost">
<label for="paid">Оплачено</label><input type="text" name="paid" id="paid">

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





