<?php
session_start();

// Функция isset используется для проверки, залогинен ли уже пользователь и сохранены ли его данные в сессии.
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbcon.php';

$qry="delete from members where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:../remove-member.php');
}else{
    echo"Ошибка!";
}
}
?>