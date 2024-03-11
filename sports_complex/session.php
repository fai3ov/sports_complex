<?php
session_start();
// Проверяем, присутствует ли переменная сеанса SESS_MEMBER_ID или нет
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['user_id'];

?>