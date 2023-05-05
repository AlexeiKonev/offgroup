<?php
//получаем доступ к классу DataBase
require_once 'DataBase.php';


$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";

$db = new DataBase($host,$db_name,$username,$password);
$pdo = $db->getPdo();

// id заказа соответствует инкрементированому id таблицы orders
$id = $_GET['id'];


// Получение данных из таблицы orders
$sqlOrder = "SELECT * FROM orders WHERE id =".$id;
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
    <title>Заказ </title>
</head>
<body>
<table>

</table>
<table>
    <tr><th>ID Покупателя </th><th>Описание</th><th>Общая стоимость</th><th>Оплачено</th><th>Не оплачено</th><th></th></tr>
    <?php
    foreach ($orders as $order): ?>
        <tr>

            <td><?=$order['customer_id'] ?></td>

            <td><?=$order['description'] ?></td>
            <td><?=$order['total_cost'] ?></td>
            <td><?=$order['paid'] ?></td>
            <td><?=$order['not_paid'] ?></td>
            <td>
                <form method="get">
                    <a href='customer.php?customer_id=<?=$order['customer_id']?>'>

                        Просмотреть покупателя
                    </a>
                </form>
            </td>

        </tr>
    <?php endforeach; ?>
</table>
<a href='index.php'>вернуться на главную</a>
</body>
</html>
