<?php
require_once 'DataBase.php';

// Подключение к базе данных
$host = "localhost";
$db_name = "off_group";
$username = "user";
$password = "root";

$db = new DataBase($host,$db_name,$username,$password);
$pdo = $db->getPdo();

// Получение данных из формы
$customer_id = $_POST['customer_id'];

$description = $_POST['description'];
$total_cost = $_POST['total_cost'];
$paid = $_POST['paid'];

// Проверка данных
$errors = array();
if (empty($customer_id)) {
    $errors[] = 'Не указан идентификатор покупателя';
}
if (empty($description)) {
    $errors[] = 'Не указано описание заказа';
}
if (!is_numeric($total_cost)) {
    $errors[] = 'Общая стоимость должна быть числом';
}
if (!is_numeric($paid)) {
    $errors[] = 'Оплачено должно быть числом';
}
if ($total_cost < $paid) {
    $errors[] = 'Оплачено не может быть больше общей стоимости';
}

// Если есть ошибки, выводим их пользователю
if (!empty($errors)) {
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
} else {
    // Добавление данных в базу данных
    $sql = "INSERT INTO orders (customer_id, description, total_cost, paid, not_paid)
            VALUES (:customer_id, :description, :total_cost, :paid, :not_paid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':customer_id' => intval($customer_id),
        ':description' => $description,
        ':total_cost' => $total_cost,
        ':paid' => $paid,
        ':not_paid' => $total_cost - $paid
    ));
    // Перенаправляем пользователя на страницу со списком заказов
    header('Location: index.php');
    exit();
}
?>
