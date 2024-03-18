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
<?php $page="dashboard"; include '../includes/header.php'?>
<!--close-top-Header-menu-->


<!--sidebar-menu-->
<?php $page="dashboard"; include '../includes/sidebar.php'?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="icon-home"></i> Главная страница</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!-- <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb span"> <a href="index.php"> <i class="icon-dashboard"></i> System Dashboard </a> </li>

        <li class="bg_ls span2"> <a href="announcement.php"> <i class="icon-bullhorn"></i>Announcements </a> </li> -->

        
        <!-- <li class="bg_ls span2"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_ly span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_lb span2"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li> -->
        <!-- <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li> -->

      <!-- </ul>
    </div> -->
<!--End-Action boxes-->    

<!--Chart-box-->    
    <div class="row-fluid">
    <div class="widget-box widget-plain">
      <div class="center">
        <ul class="stat-boxes2">
          <li>
            <div class="left peity_bar_neutral"><span><span style="display: none;">2,4,9,7,12,10,12</span>
              <canvas width="60" height="24"></canvas>
              </span>+10%</div>
            <div class="right"> <strong><?php include 'dashboard-usercount.php' ?></strong> Зарегистрировано </div>
          </li>
          <li>
            <div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
              <canvas width="60" height="24"></canvas>
              </span>17.8%</div>
            <div class="right"> <strong>₽ <?php include 'income-count.php' ?></strong> Общий доход </div>
          </li>
          <li>
            <div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
              <canvas width="60" height="24"></canvas>
              </span>-40%</div>
            <div class="right"> <strong><?php include 'actions/count-trainers.php' ?></strong> Активные тренеры </div>
          </li>
          <li>
            <div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
              <canvas width="60" height="24"></canvas>
              </span>+5%</div>
            <div class="right"> <strong><?php include 'actions/count-equipments.php' ?></strong> Оборудование </div>
          </li>
          <li>
            <div class="left peity_bar_good"><span>12,6,9,23,14,10,13</span>+9%</div>
            <div class="right"> <strong><?php include 'actions/dashboard-staff-count.php' ?></strong> Сотрудники </div>
          </li>
        </ul>
      </div>
    </div>
    </div><!-- End of row-fluid -->
	
<!--End-Chart-box--> 
    <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Объявления спорткомплекса</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php

                include "dbcon.php";
                $qry="select * from announcements";
                  $result=mysqli_query($conn,$qry);
                  
                while($row=mysqli_fetch_array($result)){
                  echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/demo/av1.jpg'> </div>";
                  echo"<div class='article-post'>"; 
                  echo"<span class='user-info'>".$row['date']." </span>";
                  echo"<p><a href='#'>".$row['message']."</a> </p>";
                 
                }

                echo"</div>";
                echo"</li>";
              ?>

                <button class="btn btn-warning btn-mini">Посмотреть все</button>
              </li>
            </ul>
          </div>
        </div>
       
         
      </div>
      <div class="span6">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-tasks"></i></span>
            <h5>Списки задач клиентов</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php

                include "dbcon.php";
                $qry="SELECT * FROM todo";
                $result=mysqli_query($conn,$qry);

                while($row=mysqli_fetch_array($result)){ ?>

                <li class='clearfix'> 
                                                                        
                    <div class='txt'> <?php echo $row["task_desc"]?> <?php if ($row["task_status"] == "Pending") { echo '<span class="date badge badge-important">В ожидании</span>';} else { echo '<span class="date badge badge-success">В процессе</span>'; }?></div>
                
               <?php }
                echo"</li>";
              echo"</ul>";
              ?>
            </div>
          </div>
        </div>
      </div> <!-- End of ToDo List Bar -->
    </div><!-- End of Announcement Bar -->
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
<!-- <script src="../js/matrix.interface.js"></script>  -->
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
