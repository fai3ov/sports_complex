<?php

session_start();

// Функция isset используется для проверки, залогинен ли уже пользователь и сохранены ли его данные в сессии.
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbcon.php';


$qry="delete from staffs where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"Удалено";
    header('Location:staffs.php');
}else{
    echo"Ошибка!";
}
}
?>