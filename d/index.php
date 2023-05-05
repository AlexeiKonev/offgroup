<?php
require_once 'DataBase.php';

//$db = new db('localhost','user','root','off_group');
// Подключение к базе данных
//$host = $db->getHost();
//$username =$db->getUsername() ;
//$password = $db->getPassword();
//$dbname =$db-> getDBname();

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

// Получение данных из таблицы orders
$sql = "SELECT * FROM orders";
$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Отображение данных на странице
echo "<table>";
echo "<tr><th>ID</th><th>Покупатель</th><th>Описание</th><th>Общая стоимость</th><th>Оплачено</th><th>Действия</th></tr>";
foreach ($orders as $order) {
    echo "<tr>";
    echo "<td>" . $order['id'] . "</td>";
    echo "<td>" . $order['customer_id'] . "</td>";
    echo "<td>" . $order['customer'] . "</td>";
    echo "<td>" . $order['description'] . "</td>";
    echo "<td>" . $order['total_cost'] . "</td>";
    echo "<td>" . $order['paid'] . "</td>";
    echo "<td><a href='customer.php?id=" . $order['customer_id'] . "'>Просмотреть</a></td>";

    echo "</tr>";
}
echo "</table>";




