<?php
$host = 'localhost';
$database = 'publications';
$user = 'root';
$password = '';
$mysqli = mysqli_connect($host, $user, $password, $database);
// Проверяем соединение
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
