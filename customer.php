<?php

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



// Получаем значение параметра customer_id из запроса
$customer_id = $_GET["customer_id"];
var_dump($customer_id);

// Получение данных из таблицы customers
$sqlCustomer = "SELECT * FROM customers WHERE customer_id =".$customer_id ;
$stmtCustomer = $pdo->query($sqlCustomer);
$customers = $stmtCustomer->fetchAll(PDO::FETCH_ASSOC);

// Получение данных из таблицы orders
$sqlOrder = "SELECT * FROM orders WHERE customer_id =".$customer_id;
$stmtOrder = $pdo->query($sqlOrder);
$orders = $stmtOrder->fetchAll(PDO::FETCH_ASSOC);


// Формируем SQL-запрос для выборки данных из таблицы customers
$sql = "SELECT * FROM customers WHERE customer_id = " . $customer_id;

// Выполняем запрос и получаем результат
$result = $conn->query($sqlOrder);
$result = $conn->query($sql);

// Выводим данные на экран
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "customer_id: " . $row["customer_id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
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
    <tr><th>ID</th><th>Имя</th><th>Контакты</th></tr>
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
