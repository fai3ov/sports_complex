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
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
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
<?php $page='payment'; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from members where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Главная страница</a> <a href="payment.php">Платежи от клиентов</a> <a class="current">Счёт на оплату</a> </div>
        <h1>Форма оплаты</h1>
    </div>

    <div class="container-fluid" style="margin-top:-38px;">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="fas fa-money"></i> </span>
                        <h5>Платёж</h5>
                    </div>
                    <div class="widget-content">
                        <div class="row-fluid">
                            <div class="span5">
                                <table class="">
                                    <tbody>
                                    <tr>
                                        <td><img src="../img/gym-logo.png" alt="Gym Logo" width="175"></td>
                                    </tr>
                                    <tr>
                                        <td><h4>Спортивный комплекс</h4></td>
                                    </tr>
                                    <tr>
                                        <td>г. Казань, Россия</td>
                                    </tr>

                                    <tr>
                                        <td>Тел.: +7 (900) 555-44-33</td>
                                    </tr>
                                    <tr>
                                        <td >Email: support@sportscomplex.com</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="span7">
                                <table class="table table-bordered table-invoice">

                                    <tbody>
                                    <form action="userpay.php" method="POST">
                                        <tr>
                                        <tr>
                                            <td class="width30">Полное имя клиента :</td>
                                            <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                                            <td class="width70"><strong><?php echo $row['fullname']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Услуга :</td>
                                            <input type="hidden" name="services" value="<?php echo $row['services']; ?>">
                                            <td><strong><?php echo $row['services']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Сумма в месяц :</td>
                                            <td><input id="amount" type="number" name="amount" value='<?php if($row['services'] == 'Fitness') { echo '55';} elseif ($row['services'] == 'Sauna') { echo '35';} else {echo '40';} ?>' /></td>
                                        </tr>

                                        <input type="hidden" name="paid_date" value="<?php echo $row['paid_date']; ?>">

                                        <td class="width30">План :</td>
                                        <td class="width70">
                                            <div class="controls">
                                                <select name="plan" required="required" id="select">
                                                    <option value="1" selected="selected" >1 месяц</option>
                                                    <option value="3">3 месяца</option>
                                                    <option value="6">6 месяцев</option>
                                                    <option value="12">1 год</option>
                                                    <option value="0">Бессрочно</option>

                                                </select>
                                            </div>

                                        </td>

                                        <tr>

                                        </tr>
                                        <td class="width30">Статус клиента :</td>
                                        <td class="width70">
                                            <div class="controls">
                                                <select name="status" required="required" id="select">
                                                    <option value="Active" selected="selected" >Активен</option>
                                                    <option value="Expired">Истёк</option>

                                                </select>
                                            </div>
                                        </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>


                        </div> <!-- row-fluid ends here -->

                        <div class="row-fluid">
                            <div class="span12">


                                <hr>
                                <div class="text-center">
                                    <!-- user's ID is hidden here -->

                                    <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">

                                    <button class="btn btn-success btn-large" type="SUBMIT" href="">Произвести платёж</button>
                                </div>

                                </form>
                            </div><!-- span12 ends here -->
                        </div><!-- row-fluid ends here -->

                        <?php
                        }
                        ?>
                    </div><!-- widget-content ends here -->


                </div><!-- widget-box ends here -->
            </div><!-- span12 ends here -->
        </div> <!-- row-fluid ends here -->
    </div> <!-- container-fluid ends here -->
</div> <!-- div id content ends here -->

<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Developed By Ilfat Faizov</a> </div>
</div>

<style>
    #footer {
        color: white;
    }
</style>
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

<script type="text/javascript">
    // Эта функция вызывается из всплывающих меню для перехода на другую страницу.
    // Игнорировать, если возвращаемое значение является пустой строкой.
    function goPage(newURL) {

        // Если URL пуст, пропустить разделители меню и сбросить выбор в меню на значение по умолчанию:
        if (newURL != "") {

            // Если URL равен "-", это текущая страница - сбросить меню:
            if (newURL == "-") {
                resetMenu();
            }
            // В противном случае, перейти на указанный URL:
            else {
                document.location.href = newURL;
            }
        }
    }

    // Сбрасывает выбор в меню при входе на страницу
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>