<!DOCTYPE html>
<html lang="en">
<head>
<title>Sports Complex Customer</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<form role="form" action="index.php" method="POST">
            <?php 

if(isset($_POST['fullname'])){
$fullname = $_POST["fullname"];    
$username = $_POST["username"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$services = $_POST["services"];
$plan = $_POST["plan"];
$address = $_POST["address"];
$contact = $_POST["contact"];

$password = md5($password);

include 'dbcon.php';

$qry = "insert into members(fullname,username,password,dor,gender,services,amount,plan,address,contact,status) values ('$fullname','$username','$password', CURRENT_TIMESTAMP,'$gender','$services','0','$plan','$address','$contact','Pending')";
$result = mysqli_query($con,$qry);

if(!$result){
  echo"<div class='container-fluid'>";
      echo"<div class='row-fluid'>";
      echo"<div class='span12'>";
      echo"<div class='widget-box'>";
      echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
          echo"<h5>Сообщение об ошибке</h5>";
          echo"</div>";
          echo"<div class='widget-content'>";
              echo"<div class='error_ex'>";
              echo"<h1 style='color:maroon;'>Error 404</h1>";
              echo"<h3>Произошла ошибка при обновлении данных.</h3>";
              echo"<p>Пожалуйста, попробуйте ещё раз.</p>";
              echo"<a class='btn btn-warning btn-big'  href='../pages/index.php'>Назад</a> </div>";
          echo"</div>";
          echo"</div>";
      echo"</div>";
      echo"</div>";
  echo"</div>";
}else {

  echo"<div class='container-fluid'>";
      echo"<div class='row-fluid'>";
      echo"<div class='span12'>";
      echo"<div class='widget-box'>";
      echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
          echo"<h5>Сообщение</h5>";
          echo"</div>";
          echo"<div class='widget-content'>";
              echo"<div class='error_ex'>";
              echo"<h1>Успех</h1>";
              echo"<h3>Информация о клиенте добавлена!</h3>";
              echo"<p>Запрошенные детали добавлены. Пожалуйста, нажмите кнопку, чтобы вернуться назад.</p>";
              echo"<a class='btn btn-inverse btn-big'  href='../index.php'>Назад</a> </div>";
          echo"</div>";
          echo"</div>";
      echo"</div>";
      echo"</div>";
  echo"</div>";

}

}else{
    echo"<h3>ВЫ НЕ ИМЕЕТЕ ПРАВА НА ПЕРЕАДРЕСАЦИЮ ЭТОЙ СТРАНИЦЫ. ВЕРНИТЕСЬ НА <a href='index.php'> ПАНЕЛЬ УПРАВЛЕНИЯ </a></h3>";
}


?>

                                    </form>
</body>
<!--end-Footer-part-->

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script>