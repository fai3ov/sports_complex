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
    <title>Sports Complex Admin</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/fullcalendar.css"/>
    <link rel="stylesheet" href="../css/matrix-style.css"/>
    <link rel="stylesheet" href="../css/matrix-media.css"/>
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet"/>
    <link href="../font-awesome/css/all.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">Sports Complex Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<?php include 'includes/topheader.php' ?>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<?php $page = 'members-entry';
include 'includes/sidebar.php' ?>
<!--sidebar-menu-->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                Главная страница</a> <a href="#" class="tip-bottom">Клиенты спорткомплекса</a> <a
                    href="member-entry.php" class="current">Добавление клиента</a></div>
        <h1>Форма регистрации клиента</h1>
    </div>
    <form role="form" action="index.php" method="POST">

        <?php
        if (isset($_POST['fullname'])) {
            // Собираем данные из формы
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $gender = $_POST["gender"];
            $dob = $_POST["dob"];
            $services = isset($_POST["services"]) ? implode(', ', $_POST["services"]) : ''; // Преобразуем выбранные услуги в строку
            $amount = $_POST["amount"];
            $plan = $_POST["plan"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            // По умолчанию значения для полей, которые не заполняются формой
            $dor = date("Y-m-d");   // Текущая дата для dor
            $paid_date = NULL;      // NULL для paid_date
            $end_of_plan = NULL;    // NULL для end_of_plan
            $status = 'Pending';    // Значение по умолчанию для статуса
            $attendance_count = 0;  // Начальное значение счётчика посещений
            $ini_weight = 0;        // Начальный вес
            $curr_weight = 0;       // Текущий вес
            $ini_bodytype = '';     // Начальный тип телосложения
            $curr_bodytype = '';    // Текущий тип телосложения
            $progress_date = NULL;  // NULL для progress_date
            $reminder = 0;          // Напоминание
            $last_reminder_date	= NULL;     // NULL для last_reminder_date

            include 'dbcon.php'; // Подключение к базе данных

            // Подготовка SQL запроса
            $qry = $conn->prepare("INSERT INTO members (fullname, username, password, gender, dob, dor, services, amount, paid_date, end_of_plan, plan, address, contact, status, attendance_count, ini_weight, curr_weight, ini_bodytype, curr_bodytype,progress_date, reminder, last_reminder_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Привязка параметров
            $qry->bind_param("sssssssissssssiiisssis", $fullname, $username, $password, $gender, $dob, $dor, $services, $amount, $paid_date, $end_of_plan, $plan, $address, $contact, $status, $attendance_count, $ini_weight, $curr_weight, $ini_bodytype, $curr_bodytype, $progress_date, $reminder, $last_reminder_date);

            // Выполнение запроса
            $result = $qry->execute();

            if (!$result) {
                echo "<div class='container-fluid'>";
                echo "<div class='row-fluid'>";
                echo "<div class='span12'>";
                echo "<div class='widget-box'>";
                echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                echo "<h5>Сообщение об ошибке</h5>";
                echo "</div>";
                echo "<div class='widget-content'>";
                echo "<div class='error_ex'>";
                echo "<h1 style='color:maroon;'>Error 404</h1>";
                echo "<h3>Произошла ошибка при обновлении данных.</h3>";
                echo "<p>Пожалуйста, попробуйте ещё раз.</p>";
                echo "<a class='btn btn-warning btn-big'  href='edit-member.php'>Назад</a> </div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<div class='container-fluid'>";
                echo "<div class='row-fluid'>";
                echo "<div class='span12'>";
                echo "<div class='widget-box'>";
                echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                echo "<h5>Сообщение</h5>";
                echo "</div>";
                echo "<div class='widget-content'>";
                echo "<div class='error_ex'>";
                echo "<h1>Успех</h1>";
                echo "<h3>Информация о клиенте добавлена!</h3>";
                echo "<p>Запрошенные детали добавлены. Пожалуйста, нажмите кнопку, чтобы вернуться назад.</p>";
                echo "<a class='btn btn-inverse btn-big' href='members.php'>Назад</a> </div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<h3>ВЫ НЕ ИМЕЕТЕ ПРАВА НА ПЕРЕАДРЕСАЦИЮ ЭТОЙ СТРАНИЦЫ. ВЕРНИТЕСЬ НА <a href='index.php'> ПАНЕЛЬ УПРАВЛЕНИЯ </a></h3>";
        }
        ?>
    </form>
</div>
</div></div>
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
