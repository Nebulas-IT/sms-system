<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/left_sidebar.php'; ?>

<link href="assets/font-awesome-4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="assets/css/chatbox.css" type="text/css" rel="stylesheet">

<?php
require_once __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

function send_message($mobile, $message_body){
    // Your Account Sid and Auth Token from twilio.com/console
    $sid    = "AC6826376f6bcbc2cf7a734c0bfe659ea9";
    $token  = "62efe81df507a1fdaa2a8ca315182a1a";
    $twilio = new Client($sid, $token);
//    echo "My Message: " . $message_body;
    $message = $twilio->messages
        ->create($mobile,
            array(
                "body" => $message_body,
                "from" => "+12145167706",
                //"mediaUrl" => "http://www.example.com/cheeseburger.png"
            )
        );
    if ($message->sid) {
        return "Message Sent !!!";
    }else {
        return "Message Not Sent !!!";
    }
}


$data = array();
if (!isset($_GET['no']) || $_GET['no'] == NULL) {
    echo "<script>window.location = 'inbox.php'; </script>";
}else if (!isset($_GET['no']) || $_GET['no'] != NULL) {
    $data['mobile'] = '+' . $_GET['no'];
    $data['mobile'] = str_replace(' ', '', $data['mobile']);

    $rowcount=mysqli_num_rows($msg->getReceiveMessageByNumber($data['mobile']));
    //echo $rowcount;
    if ($rowcount < 1)
    echo "<script>window.location = 'inbox.php'; </script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $data = $_POST;
    $data['short_code'] = '1234';
    $data['mobile'] = '+' . $_GET['no'];
    $data['mobile'] = str_replace(' ', '', $data['mobile']);
    date_default_timezone_set('Asia/Dhaka');
    $data['date_time'] = date('Y-m-d h:i:s');
    $sendFromChatBox = $msg->sendMessageFromChatBox($data);
   // $messageSendStatus = send_message($data['mobile'], $data['message']);

}
?>



<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->


<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
           
            <h3><i class="fa fa-angle-right"></i>Add Contact</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="mesgs">
                        <div class="msg_history">
                           
                        </div>
                        <form action="" method="post">
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <input type="hidden" name="" id="getMobile" value="<?php echo $data['mobile']?>">
                                    <input id="message" type="text" class="write_msg" name="message" placeholder="Type a message"/>
                                    <button class="msg_send_btn" type="submit" name="submit" id="btnSave" value="submit"><i class="fa fa-paper-plane-o"
                                                                                                aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><!-- /col-lg-9 -->
        <?php include "inc/right_sidebar.php"; ?>

    </section>
    <! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<?php include('inc/footer.php') ?>
<?php include('inc/javascripts.php') ?>

<script type="text/javascript">
    $(document).ready(function () {
        setInterval(function () {
             
            var url = 'chatbox_without_refresh.php';
            
            var number = $('#getMobile').val();
            $.ajax({
                type: 'ajax',
                method:'post',
                url: url,
                data: {
                    number: number,
                    send: 0
                },
                //async: false,
                dataType: 'html',
                success: function(response){
                    //alert(response);
                    $('.msg_history').html(response);
                }
            });
      
        },2000);

         $('#btnSave').click(function(event){
            var url = 'chatbox_without_refresh.php';
            var message = $('#message').val();
            event.preventDefault();
            var number = $('#getMobile').val();
            $.ajax({
                type: 'ajax',
                method:'post',
                url: url,
                data: {
                    message: message,
                    number: number,
                    send: 1
                },
                //async: false,
                dataType: 'html',
                success: function(response){
                    //alert(response);
                    $('.msg_history').html(response);
                }
            });
        });
    });
    
</script>



