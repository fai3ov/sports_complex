<?php

session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];
$last_reminder_date	= date("Y-m-d");   // Текущая дата

include 'dbcon.php';

// Обновляем поля reminder и last_reminder_date
$qry = "UPDATE members SET reminder = '1', last_reminder_date = '$last_reminder_date' WHERE user_id = $id";
$result=mysqli_query($conn,$qry);

if($result){
    echo '<script>alert("Уведомление отправлено выбранному клиенту!")</script>';
    echo '<script>window.location.href = "payment.php";</script>';
    
}else{
    echo"Ошибка!";
}
}
?>