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
<?php $page='update-equip'; include 'includes/sidebar.php'?>
<!--sidebar-menu-->
    <?php
        include 'dbcon.php';
        $id=$_GET['id'];
        $qry= "select * from equipment where id='$id'";
        $result=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($result)){
    ?> 

<div id="content">
<div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i> Главная страница</a> <a href="equipment.php" class="tip-bottom">Спортинвентарь</a> <a href="edit-equipment.php" class="current">Обновление информации о спортинвентаре</a> </div>
  <h1>Обновление информации о спортинвентаре</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Информация об спортинвентаре</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="edit-equipment-req.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Спортинвентарь :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" value='<?php echo $row['name']; ?>' required />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Описание :</label>
              <div class="controls">
                <input type="text" class="span11" name="description" value='<?php echo $row['description']; ?>' required />
              </div>
            </div>
           
            
            <div class="control-group">
              <label class="control-label">Дата покупки :</label>
              <div class="controls">
                <input type="date" name="date" value='<?php echo $row['date']; ?>' class="span11" />
                <span class="help-block">Пожалуйста, укажите дату покупки</span> </div>
            </div>

             <div class="control-group">
              <label class="control-label">Количество :</label>
              <div class="controls">
                <input type="number" class="span4" name="quantity" value='<?php echo $row['quantity']; ?>'  required />
              </div>
            </div>
        </div>

        <div class="widget-content nopadding">
          <div class="form-horizontal">
          
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">

          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Другие детали</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">

              <div class="control-group">
                  <label class="control-label">Продавец :</label>
                  <div class="controls">
                      <input type="text" class="span11" name="vendor" value='<?php echo $row['vendor']; ?>' required />
                  </div>
              </div>

              <div class="control-group">
                  <label class="control-label">Адрес :</label>
                  <div class="controls">
                      <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' required />
                  </div>
              </div>

            <div class="control-group">
              <label for="normal" class="control-label">Телефон :</label>
              <div class="controls">
                <input type="text" id="mask-phone" name="contact" minlength="10" maxlength="10" value='<?php echo $row['contact']; ?>' class="span8 mask text" required>
                <span class="help-block blue span8">(900) 100-10-10</span>
                </div>
            </div>



          </div>

              <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
          <h5>Цены</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            

            <div class="control-group">
              <label class="control-label">Общая сумма: </label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">₽</span>
                  <input type="number" placeholder="120000" name="amount" value='<?php echo $row['amount']; ?>' class="span11" required>
                  </div>
              </div>
            </div>

            <div class="form-actions text-center">
                <!-- user's ID is hidden here -->
             <input type="hidden" name="id" value="<?php echo $row['id'];?>">
              <button type="submit" class="btn btn-success">Обновить информацию</button>
            </div>
            </form>

          </div>

          <?php
        }
    ?>

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
        function goPage (newURL) {

            // Если URL пуст, пропустить разделители меню и сбросить выбор в меню на значение по умолчанию:
            if (newURL != "") {

                // Если URL равен "-", это текущая страница - сбросить меню:
                if (newURL == "-" ) {
                    resetMenu();
                }
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
