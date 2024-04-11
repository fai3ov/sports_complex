<?php
session_start();

// Функция isset используется для проверки, залогинен ли уже пользователь и сохранены ли его данные в сессии.
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sports Complex Customer</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/fullcalendar.css"/>
    <link rel="stylesheet" href="../css/matrix-style.css"/>
    <link rel="stylesheet" href="../css/matrix-media.css"/>
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="index.php">Sports Complex Customer</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<?php include '../includes/topheader.php' ?>
<!--close-top-Header-menu-->

<!--start-top-serch-->
<!-- <div id="search">
  <input type="hidden" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div> -->
<!--close-top-serch-->

<!--sidebar-menu-->
<?php $page = "reminder";
include '../includes/sidebar.php' ?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.php" title="Перейти на главную страницу" class="tip-bottom"><i
                        class="icon-home"></i> Главная страница</a> <a href="customer-reminder.php" class="current">Напоминания</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <!--End-Action boxes-->

        <div class="row-fluid">
            <div class="span12">
                <?php
                include "dbcon.php";
                $qry = "SELECT status, end_of_plan, reminder, last_reminder_date FROM members WHERE user_id='" . $_SESSION['user_id'] . "'";
                $cnt = 1;
                $result = mysqli_query($con, $qry);

                while ($row = mysqli_fetch_array($result)) { ?>
                    <?php if ($row['reminder'] == '1') { ?>
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">ВНИМАНИЕ</h4>
                            <p>
                                <?php if ($row['status'] == 'Active') { ?>
                                    Срок действия Вашего текущего абонемента истечёт <?php echo $row['end_of_plan']; ?>.
                                    Пожалуйста, внесите платёж до истечения срока оплаты.
                                    <br>
                                    ВАЖНО ВОВРЕМЯ ПОГАСИТЬ ВСЕ ЗАДОЛЖЕННОСТИ, ЧТОБЫ ИЗБЕЖАТЬ ПРЕРЫВАНИЯ УСЛУГ.
                                <?php } else if ($row['status'] == 'Pending') { ?>
                                    Ваш абонемент не оплачен.
                                    Пожалуйста, внесите платёж.
                                    <br>
                                    ВАЖНО ВОВРЕМЯ ПОГАСИТЬ ВСЕ ЗАДОЛЖЕННОСТИ, ЧТОБЫ ИЗБЕЖАТЬ ПРЕРЫВАНИЯ УСЛУГ.
                                <?php } ?>
                            </p>
                            <hr>
                            <p class="mb-0">Мы ценим Вас как нашего клиента и надеемся на дальнейшее сотрудничество.</p>
                            <p class="mb-0">Уведомление отправлено <?php echo $row['last_reminder_date']; ?>.</p>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Напоминаний пока нет!</h4>
                        </div>
                    <?php }
                } ?>

            </div>
        </div><!-- End of row-fluid -->
    </div><!-- End of container-fluid -->
</div><!-- End of content-ID -->
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
