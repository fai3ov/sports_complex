<?php

$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Соединение не удалось");
}

$sql = "SELECT * FROM staffs WHERE designation='Тренер (зал)' OR designation='Тренер (йога)' OR designation='Тренер (бассейн)' OR designation='Ассистент тренера'";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>