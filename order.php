<?php
//require_once "./ordertable_row.php";


$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";
try {
    $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
//    $pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $username, $password);
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}



$id = $_GET['id'];





// Получение данных из таблицы orders
$sqlOrder = "SELECT * FROM orders WHERE id =".$id;;
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
    <tr><th>ID</th><th>Покупатель</th><th>Описание</th><th>Общая стоимость</th><th>Оплачено</th><th>Действия</th></tr>
    <?php
    foreach ($orders as $order): ?>
        <tr>
            <td><?=$order['id']?></td>
            <td><?=$order['customer_id'] ?></td>
            <td><?=$order['customer'] ?></td>
            <td><?=$order['description'] ?></td>
            <td><?=$order['total_cost'] ?></td>
            <td><?=$order['paid'] ?></td>
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
</body>
</html>
