<?php
session_start();

// Функция isset используется для проверки, залогинен ли уже пользователь и сохранены ли его данные в сессии.
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<?php 
        
            if(isset($_POST['fullname'])){
            $fullname = $_POST["fullname"];    
            $username = $_POST["username"];
            $gender = $_POST["gender"];
            $contact = $_POST["contact"];
            $address = $_POST["address"];
            $designation = $_POST["designation"];
            $id = $_POST["id"];

            include 'dbcon.php';

            $qry = "update staffs set fullname='$fullname', username='$username', gender='$gender', contact='$contact',  address='$address', designation='$designation' where user_id='$id'";
            $result = mysqli_query($con,$qry);

            if(!$result){
                echo"ERROR!!";
            }else {

                header('Location:staffs.php');

            }

            }else{
                echo"<h3>ВЫ НЕ ИМЕЕТЕ ПРАВА НА ПЕРЕАДРЕСАЦИЮ ЭТОЙ СТРАНИЦЫ. ВЕРНИТЕСЬ НА <a href='index.php'> ПАНЕЛЬ УПРАВЛЕНИЯ </a></h3>";
            }
?>