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
    <h1 class="text-center">Форма добавления сотрудника <i class="fas fa-briefcase"></i></h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-briefcase"></i> </span>
            <h5>Информация о сотруднике</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" action="added-staffs.php" class="form-horizontal" method="POST">
              <div id="form-wizard-1" class="step">

              <div class="control-group">
                  <label class="control-label">Полное имя :</label>
                  <div class="controls">
                    <input id="fullname" type="text" name="fullname" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Имя пользователя :</label>
                  <div class="controls">
                    <input id="username" type="text" name="username" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Пароль :</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Подвердите пароль :</label>
                  <div class="controls">
                    <input id="password2" type="password" name="password2" />
                  </div>
                </div>
              </div>

              <div id="form-wizard-2" class="step">
                <div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Адрес</label>
                  <div class="controls">
                    <input id="address" type="text" name="address" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Должность</label>
                  <div class="controls">
                  <select name="designation" id="designation">
                    <option value="Тренер (зал)">Тренер (зал)</option>
                      <option value="Тренер (йога)">Тренер (йога)</option>
                      <option value="Тренер (бассейн)">Тренер (бассейн)</option>
                    <option value="Ассистент тренера">Ассистент тренера</option>
                    <option value="Хостес">Хостес</option>
                    <option value="Бухгалтер">Бухгалтер</option>
                    <option value="Менеджер">Менеджер</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Пол</label>
                  <div class="controls">
                    <select name="gender" id="gender">
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Телефон</label>
                    <div class="controls">
                        <input id="mask-phone" type="text" name="contact" minlength="10" maxlength="10" required />
                    </div>
                </div>

              </div>

              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Proceed Next Step" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div><!--end of widget box-->
      </div><!--end of span 12 -->
    </div>
  </div>
</div>

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

<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.wizard.js"></script>
</body>
</html>
