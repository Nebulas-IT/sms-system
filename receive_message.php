
<?php
include 'lib/Session.php';
Session::init();
include('lib/Database.php');
include('helpers/Format.php');
//include 'plugins/currencySymbol.php';

spl_autoload_register(function($class){
    include_once "classes/".$class.".php";
});

$db     = new Database();
$fm     = new Format();
$csv    = new Contact_info_from_file();
$msg    = new Message();
?>

<?php
$data['number'] = $_POST['From'];
$data['body']   = $_POST['Body'];
$msg->receive_message($data);
header('content-type: text/xml');
?>