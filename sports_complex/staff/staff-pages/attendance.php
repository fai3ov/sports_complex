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
<title>Sports Complex Staff</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Sports Complex Staff</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<?php include '../includes/header.php'?>

<!--close-top-Header-menu-->
<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->
<!--sidebar-menu-->
<?php $page="attendance"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Главная страница</a> <a href="attendance.php" class="current">Регистрация прихода/ухода</a> </div>
        <h1 class="text-center">Регистрация прихода/ухода <i class="ficon icon-calendar"></i></h1>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class='widget-box'>
                    <div class='widget-title'> <span class='icon'> <i class='icon-th'></i> </span>
                        <h5>Таблица посещений клиентов</h5>
                    </div>
                    <div class='widget-content nopadding'>


                        <table class='table table-bordered table-hover'>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Полное имя</th>
                                <th>Телефон</th>
                                <th>Выбранные услуги</th>
                                <th>Действие</th>
                            </tr>
                            </thead>

                            <?php include "dbcon.php";
                            ini_set('display_errors', 0); // Не показывать ошибки
                            error_reporting(0); // Отключить отчёт об ошибках
                            date_default_timezone_set('Europe/Moscow');
                            $current_date = date('Y-m-d H:i', time());
                            $exp_date_time = explode(' ', $current_date);
                            $todays_date =  $exp_date_time['0'];
                            $qry="SELECT * FROM members WHERE status = 'Active'";
                            $result=mysqli_query($conn,$qry);
                            $i=1;
                            $cnt = 1;
                            while($row=mysqli_fetch_array($result)){ ?>

                                <tbody>

                                <td><div class='text-center'><?php echo $cnt; ?></div></td>
                                <td><div class='text-center'><?php echo $row['fullname']; ?></div></td>
                                <td><div class='text-center'><?php echo $row['contact']; ?></div></td>
                                <td><div class='text-center'><?php echo $row['services']; ?></div></td>

                                <!-- <span>count</span><br>CHECK IN</td> -->
                                <input type="hidden" name="user_id" value="<?php echo $row['id'];?>">

                                <?php
                                $qry = "SELECT * FROM attendance WHERE curr_date = '$todays_date' AND user_id = '".$row['user_id']."'";
                                $res = $conn->query($qry);
                                $num_count  = mysqli_num_rows($res);
                                $row_exist = mysqli_fetch_array($res);
                                $curr_date = $row_exist['curr_date'];
                                if($curr_date == $todays_date){

                                    ?>
                                    <td>
                                        <div class='text-center'><span class="label label-inverse"><?php echo $row_exist['curr_date'];?>  <?php echo $row_exist['curr_time'];?></span></div>
                                        <div class='text-center'><a href='actions/delete-attendance.php?id=<?php echo $row['user_id'];?>'><button class='btn btn-danger'>Check Out <i class='fas fa-clock'></i></button> </a></div>
                                    </td>

                                <?php } else {

                                    ?>
                                    <td><div class='text-center'><a href='actions/check-attendance.php?id=<?php echo $row['user_id'];?>'><button class='btn btn-info'>Check In <i class='fas fa-map-marker-alt'></i></button> </a></div></td>

                                <?php }
                                ?>
                                </tbody>
                                <?php $cnt++; } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->

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
<script src="../js/matrix.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.tables.js"></script>

</script>
</body>
</html>
