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
  <h1><a href="dashboard.php">Sports Complex Staff</a></h1>
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

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Главная страница</a> <a href="payment.php" class="tip-bottom">Платежи от клиентов</a> <a class="current">Счёт на оплату</a> </div>
        <h1>Платёж</h1>
    </div>
    <form role="form" action="index.php" method="POST">
        <?php

        if(isset($_POST['amount'])){

            $fullname = $_POST['fullname'];
            $paid_date = $_POST['paid_date'];
            // $p_year = date('Y');
            $services = $_POST["services"];
            $amount = $_POST["amount"];
            $plan = $_POST["plan"];
            $status = $_POST["status"];
            $id=$_POST['id'];


            $amountpayable = $amount * $plan;

            include 'dbcon.php';
            date_default_timezone_set('Europe/Moscow');
            $current_date = date('d.m.Y H:i', time());
            $exp_date_time = explode(' ', $current_date);
            $curr_date =  $exp_date_time['0'];
            $curr_time =  $exp_date_time['1'];

            $qry = "UPDATE members SET amount='$amountpayable', plan='$plan', status='$status', paid_date='$curr_date', reminder='0' WHERE user_id='$id'";
            $result = mysqli_query($conn,$qry);

            if(!$result){ ?>

                <h3 class="text-center">Что-то пошло не так!</h3>

            <?php } else { ?>

                <?php if ($status == 'Active') {?>

                    <table class="body-wrap">
                        <tbody><tr>
                            <td></td>
                            <td class="container" width="600">
                                <div class="content">
                                    <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                        <tbody><tr>
                                            <td class="content-wrap aligncenter print-container">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody><tr>
                                                        <td class="content-block">
                                                            <h3 class="text-center">Квитанция об оплате</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="content-block">
                                                            <table class="invoice">
                                                                <tbody>
                                                                <tr>
                                                                    <td><div style="float:left">Счёт № <?php echo(rand(100000,10000000));?> <br> Спортивный комплекс <br>г. Казань, Россия</div><div style="float:right"> Последняя оплата : <?php echo $paid_date?></div></td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="text-center" style="font-size:14px;"><b>Клиент : <?php echo $fullname; ?></b>  <br>
                                                                        Оплачено <?php echo date("d.m.Y H:i");?>
                                                                    </td>

                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                            <tbody>

                                                                            <tr>
                                                                                <td><b>Выбранная услуга</b></td>
                                                                                <td class="alignright"><b>Действительно</b></td>
                                                                            </tr>


                                                                            <tr>
                                                                                <td><?php echo $services; ?></td>
                                                                                <td class="alignright"><?php echo $plan?> мес.</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td><?php echo 'Стоимость в месяц'; ?></td>
                                                                                <td class="alignright"><?php echo $amount.' руб.'?></td>
                                                                            </tr>


                                                                            <tr class="total">
                                                                                <td class="alignright" width="80%">Общая сумма</td>
                                                                                <td class="alignright"><?php echo $amountpayable.' руб.' ?></td>
                                                                            </tr>
                                                                            </tbody></table>
                                                                    </td>
                                                                </tr>
                                                                </tbody></table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="content-block text-center">
                                                            Спасибо за оплату!
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                    <div class="footer">
                                        <table width="100%">
                                            <tbody><tr>
                                                <td class="aligncenter content-block"><button class="btn btn-danger" onclick="window.print()"><i class="fas fa-print"></i> Напечатать</button></td>
                                            </tr>
                                            </tbody></table>
                                    </div></div>
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>

                <?php } else {?>

                    <div class='error_ex'>
                        <h1>409</h1>
                        <h3>Похоже, вы деактивировали аккаунт клиента!</h3>
                        <p>Аккаунт выбранного участника больше не будет АКТИВНЫМ до следующего платежа.</p>
                        <a class='btn btn-danger btn-big'  href='payment.php'>Go Back</a> </div>

                <?php } ?>

            <?php   }

        } else { ?>
            <h3>ВЫ НЕ ИМЕЕТЕ ПРАВА НА ПЕРЕАДРЕСАЦИЮ ЭТОЙ СТРАНИЦЫ. ВЕРНИТЕСЬ НА <a href='index.php'> ПАНЕЛЬ УПРАВЛЕНИЯ </a></h3>";
        <?php }
        ?>
    </form>
</div>
</div></div>
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

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    /* Let's make sure all tables have defaults */
    table td {
        vertical-align: top;
    }

    /* -------------------------------------
        BODY & CONTAINER
    ------------------------------------- */

    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        /* makes it centered */
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
        HEADER, FOOTER, MAIN
    ------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }

    .footer {
        width: 100%;
        clear: both;
        color: #999;
        padding: 20px;
    }

    /* -------------------------------------
        INVOICE
        Styles for the billing table
    ------------------------------------- */
    .invoice {
        margin: 22px auto;
        text-align: left;
        width: 80%;
    }
    .invoice td {
        padding: 7px 0;
    }
    .invoice .invoice-items {
        width: 100%;
    }
    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }
    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 640px) {


        h2 {
            font-size: 18px !important;
        }


        .container {
            width: 100% !important;
        }

        .content, .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .print-container, .print-container * {
            visibility: visible;
        }

        .print-container {
            position: absolute;
            left: 0px;
            top: 0px;
            right: 0px;
        }
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
