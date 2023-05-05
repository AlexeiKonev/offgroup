<?php
//получаем доступ к классу DataBase
require_once 'DataBase.php';

$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";

$db = new DataBase($host,$db_name,$username,$password);
$pdo = $db->getPdo();


// Получение данных из таблицы orders
$sqlOrder = "SELECT * FROM orders";
$stmtOrder = $pdo->query($sqlOrder);
$orders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);


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

<form action="create-order.php" method="post">
    <table></table>
    <label for="customerID">customerID</label>
<select id="customer_id" name="customer_id">

    <option value="1">Vasia</option>

    <option value="2">Petr</option>

</select>
<label for="descriptionID">описание</label>
<select id="descriptionID" name="description">

    <option value="iphoneX">iphoneX</option>

    <option value="iphone">iphone</option>

    <option value="android">android</option>

    <option value="ipad">ipad</option>

</select>  <label for="total_cost">Стоимость</label><input type="text" name="total_cost" id="total_cost">
<label for="paid">Оплачено</label><input type="text" name="paid" id="paid">
    <input type="submit" >
</form>
<table>
    <tr>

        <th>ID Покупателя</th>
        <th>Описание</th>
        <th>Общая стоимость</th>
        <th>Оплачено</th>
        <th>не оплачено</th>
        <th>Действия</th>
    </tr>
    <?php
    foreach ($orders as $order): ?>
        <tr>

            <td><?= $order['customer_id'] ?></td>

            <td><?= $order['description'] ?></td>
            <td><?= $order['total_cost'] ?></td>
            <td><?= $order['paid'] ?></td>
            <td><?= round($order['total_cost'] -$order['paid'])   ?></td>
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





