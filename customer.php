<?php
//получаем доступ к классу DataBase
require_once 'DataBase.php';

$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";

$db = new DataBase($host,$db_name,$username,$password);
$pdo = $db->getPdo();

// Получаем значение параметра customer_id из запроса
$customer_id = $_GET["customer_id"];


// Получение данных из таблицы customers
$sqlCustomer = "SELECT * FROM customers WHERE customer_id =".$customer_id ;
$stmtCustomer = $pdo->query($sqlCustomer);
$customers = $stmtCustomer->fetchAll(PDO::FETCH_ASSOC);

// Получение данных из таблицы customers
$sqlCustomer = "SELECT * FROM customers WHERE customer_id =".$customer_id ;
$stmtCustomer = $pdo->query($sqlCustomer);
$customers = $stmtCustomer->fetchAll(PDO::FETCH_ASSOC);

// Получение данных из таблицы orders
$sqlOrder = "SELECT * FROM orders WHERE customer_id =".$customer_id;
$stmtOrder = $pdo->query($sqlOrder);
$orders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);


// Формируем SQL-запрос для выборки данных из таблицы customers
//$sql = "SELECT * FROM customers WHERE customer_id = " . $customer_id;


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
    <tr><th>ID</th><th>ID покупателя</th><th>Имя</th><th>Контакты</th></tr>
    <?php
    foreach ($customers as $customer): ?>
        <tr>
            <td><?=$customer['id']?></td>
            <td><?=$customer['customer_id'] ?></td>
            <td><?=$customer['name'] ?></td>
            <td><?=$customer['email'] ?></td>

        </tr>
    <?php endforeach; ?>
</table>
<table>

    <tr> <th>Описание</th><th>Общая стоимость</th><th>Оплачено</th><th>Не оплачено</th></tr>
    <?php
    foreach ($orders as $order): ?>
        <tr>

            <td><?=$order['description'] ?></td>
            <td><?=$order['total_cost'] ?></td>
            <td><?=$order['paid'] ?></td>
            <td><?= round($order['total_cost'] - $order['paid'])   ?></td>

        </tr>
    <?php endforeach; ?>
</table>
<a href='index.php'>вернуться на главную</a>
</body>
</html>
