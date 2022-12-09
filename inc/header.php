<?php
include 'lib/Session.php';
Session::init();
include('lib/Database.php');
include('helpers/Format.php');
//include 'plugins/currencySymbol.php';

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$ci = new Contact_info();
$search = new Search();

$csv = new Contact_info_from_file();
$msg = new Message();
$contact = new Contact_info();

?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <title>Texus Spinal & Wellness</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/sms.css">



    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--  Select Picker  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
</head>

<body>

<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><b style="color: #0078D7;">Texus Spinal & Wellness <br>
                <p class="power-by" style="font-style: italic; font-size: 12px; color: #FFFFFF">power by <strong
                            style="font-style: normal; color: #0078D7; font-size: 10px ">ZingIT Mobile</strong>-<label
                            style="font-size:12px; color: #FFFFFF;">Admin/Reports</label>
                </p></b></a>


        <!--logo end-->

        <div class="top-menu">
            <?php
            if (isset($_GET['action']) && $_GET['action'] == "logout") {
                Session::destroy();
            }
            ?>
            <ul class="nav pull-right top-menu">
                <li><a class="logout"  href="?action=logout">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->