<?php
session_start();

// Функция isset используется для проверки, залогинен ли уже пользователь и сохранены ли его данные в сессии.
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sports Complex Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Sports Complex Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<?php include 'includes/topheader.php'?>

<!--sidebar-menu-->
  <?php $page='staff-management'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Главная страница</a> <a href="staffs.php">Управление персоналом</a> <a href="staffs-entry.php" class="current">Добавление сотрудника</a> </div>
    <h1 class="text-center">Персонал спорткомплекса <i class="fas fa-users"></i></h1>
  </div>
  
  <form role="form" action="index.php" method="POST">
            <?php 

            if(isset($_POST['fullname'])){
            $fullname = $_POST["fullname"];    
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $designation = $_POST["designation"];
            $gender = $_POST["gender"];
            $contact = $_POST["contact"];

            $password = md5($password);

                    include 'dbcon.php';

                    $qry = "insert into staffs(fullname,username,password,email,address,designation,gender,contact) values ('$fullname','$username','$password','$email','$address','$designation','$gender','$contact')";
                    $result = mysqli_query($conn,$qry);

                    if(!$result){
                    echo"<div class='container-fluid'>";
                        echo"<div class='row-fluid'>";
                        echo"<div class='span12'>";
                        echo"<div class='widget-box'>";
                        echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                            echo"<h5>Сообщение об ошибке</h5>";
                            echo"</div>";
                            echo"<div class='widget-content'>";
                                echo"<div class='error_ex'>";
                                echo"<h1 style='color:maroon;'>Error 404</h1>";
                                echo"<h3>Произошла ошибка при обновлении данных.</h3>";
                                echo"<p>Пожалуйста, попробуйте ещё раз.</p>";
                                echo"<a class='btn btn-warning btn-big'  href='edit-member.php'>Назад</a> </div>";
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
                        echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                            echo"<h5>Сообщение</h5>";
                            echo"</div>";
                            echo"<div class='widget-content'>";
                                echo"<div class='error_ex'>";
                                echo"<h1>Успех</h1>";
                                echo"<h3>Информация о сотруднике добавлена!</h3>";
                                echo"<p>Запрошенные детали добавлены. Пожалуйста, нажмите кнопку, чтобы вернуться назад.</p>";
                                echo"<a class='btn btn-inverse btn-big'  href='staffs.php'>Назад</a> </div>";
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
                                </div>
</div>
</div>

</div>

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y");?> &copy; Developed By Ilfat Faizov</a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<!--end-Footer-part-->
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.wizard.js"></script>
</body>
</html>
