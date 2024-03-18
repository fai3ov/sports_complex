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
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
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
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<?php $page="member-repo"; include 'includes/sidebar.php'?>
<!--sidebar-menu-->

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Главная страница</a> <a href="member-report.php" class="current">Отчёты о клиентах</a> </div>
    <h1 class="text-center">Отчёт о клиенте <i class="fas fa-file"></i></h1>
  </div>
  <div class="container-fluid print-container">
    <div class="row-fluid">
      <div class="span12">
	          <div class="widget-box">
      <?php
            include 'dbcon.php';
            $id=$_GET['id'];
            $qry= "select * from members where user_id='$id'";
            $result=mysqli_query($conn,$qry);
            while($row=mysqli_fetch_array($result)){
            ?> 
      
     <div class="widget-content">
            <div class="row-fluid">
              <div class="span4">
                <table class="">
                  <tbody>
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
                      <td>Email: support@sportscomplex.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="span8">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">ID клиента</th>
                      <th class="head1">Выбранная услуга</th>
                      <th class="head0 right">План</th>
                      <th class="head1 right">Адрес</th>
                      <th class="head0 right">Плата</th>
                      <th class="head0 right">Подсчёт посещяемости</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><div class="text-center">ID-<?php echo $row['user_id']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['services']; ?></div></td>
                      <td><div class="text-center"><?php if($row['plan'] == 0) { echo 'NONE';} else {echo $row['plan'].' мес.';} ?></div></td>
                      <td><div class="text-center"><?php echo $row['address']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['amount'].' руб.' ?></div></td>
                      <td><div class="text-center"><?php echo $row['attendance_count']; ?> раз</div></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="55%"> <div class="text-center"><h4>Последняя произведённая оплата : <?php echo $row['amount']?> руб.</h4>
                        <em><a href="#" class="tip-bottom" title="Registration Date" style="font-size:15px;">Клиент с   <?php echo $row['dor']; ?> </a></em> </td>
                        </div>
                    </tr>
                  </tbody>
                </table>
              </div> <!-- end of span 12 -->
              
            </div>

            <div class="row-fluid">
                <div class="pull-left">
                <h4>Клиент <?php echo $row['fullname']; ?><br/> <br/> Статус : <?php echo $row['status']; ?><br/></h4><p>Спасибо, что выбрали нас!<br/>С уважением, команда спорткомплекса.</p>
                </div>
                <div class="pull-right">
                  <h4><span>Утверждено :</h4>
                  <img src="../img/report/stamp-sample.png" width="124px;" alt=""><p class="text-center">Создано автоматически</p> </div>
                  
            </div>
          </div>
		</div>
      </div>
      <?php
}
      ?>
    </div>

  </div>

  <div class="text-center">
    <button class="btn btn-danger" onclick="window.print()"><i class="fas fa-print"></i> Напечатать</button>
  </div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Developed By Ilfat Faizov</a> </div>
</div>

<style>
#footer {
  color: white;
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
