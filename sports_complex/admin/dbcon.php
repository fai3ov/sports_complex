<?php
$con = mysqli_connect("localhost","root","","gymnsb");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Не удалось подключиться к MySQL : " . mysqli_connect_error();
  }
?>
