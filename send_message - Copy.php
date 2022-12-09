<?php ob_start(); ?>
<?php include 'inc/header.php'; ?>
<?php include 'inc/left_sidebar.php'; ?>
<?php
Session::checkSession();
?>
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $messageSend = $msg->sendMessage($_POST);
}
?>

<?php
require_once __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
?>

<?php

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
        echo "Message Sent !!!";
    }
}

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
//    echo "<pre>";
//    echo print_r($_POST);
//    echo "</pre>";
    $mobiles = $_POST['mobile'];
    //echo sizeof($mobiles);
    $mobiles = preg_replace('/\s+/', '', $mobiles);
    $mobiles = explode(',', $mobiles);
    //echo $mobiles;
    $data = $_POST;
    for ($i=0; $i < sizeof($mobiles); $i++) {
        //echo $data['mobile'] = $mobiles[$i];
        // echo "<br>";

        // echo "<pre>";
        // echo print_r($data);
        // echo "</pre>";
        if (isset($data['mobile']) && ($data['message']) != '') {
            send_message($data['mobile'], $data['message']);
        }elseif (isset($data['mobile']) && ($data['template_message']) != ''){
            send_message($data['mobile'], $data['template_message']);
        }
    }
}
?>


<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="col-lg-9">
            <h3><i class="fa fa-angle-right"></i> Send Messgae</h3>
            <?php
            if (isset($messageSend)) {
                echo $messageSend;
            }
            ?>
            <div style="color: red; font-size: 15px;">
                <p>
                    To send and schedule a one time message, select
                    a
                    template or type a message in text are to the right
                </p>
            </div>
            <div class="row mt">
                <div class="form-panel">
                    <form class="form-horizontal style-form" method="POST" action="send_message.php">

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Template Message</label>

                            <div class="col-sm-10">
                                <select class="form-control" name="template_message">
                                    <option></option>
                                    <?php

                                    $getTMFSend = $msg->getTemplateMessageForSend();

                                    if ($getTMFSend) {
                                        $i = 0;
                                        while ($result = $getTMFSend->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <option value="<?php echo $result['message'] ?>"><?php echo $result['message']; ?></option>
                                        <?php }
                                    } ?>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Type Message</label>
                            <div class="col-sm-10">
                                <textarea class="sms-text-area form-control" name="message"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Short Code</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="short_code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="mobile">
                            </div>
                        </div>
                        <div class="send" style="margin-left: auto;" id="send">
                            <label for="">Send Mode</label>
                            <div class="send-mode" style="margin-left: 100px;">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="send_mode" id="nowCheck" onclick="javascript:nowfutureCheck();" value="now"
                                        >
                                        Now
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="send_mode" id="futureCheck" onclick="javascript:nowfutureCheck();" value="future">
                                        Future
                                    </label>
                                </div>
                                <div class="form-group" id="future" style="display: none;">
                                    <input type="datetime-local" name="date_time" style="  margin-left: 15px;
                                    margin-top: 20px;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;">
                                </div>
                                <div id="now" style="display: none;">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="submit" name="submit" value="Send Message"
                                       style="align-content: center; float:inherit;margin-left: 10px;font-size: 20px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /col-lg-9 -->
        <?php include "inc/right_sidebar.php"; ?>
    </section>
    <! --/wrapper -->
</section><!-- /MAIN CONTENT -->

<!--main content end-->
<?php include('inc/footer.php') ?>

<script type="text/javascript">
    window.onload = function() {
        document.getElementById('future').style.display = 'none';
        document.getElementById('now').style.display = 'none';
    }
    function nowfutureCheck() {
        if (document.getElementById('futureCheck').checked) {
            document.getElementById('future').style.display = 'block';
            document.getElementById('now').style.display = 'none';

        }
        else if(document.getElementById('nowCheck').checked) {
            document.getElementById('now').style.display = 'block';
            document.getElementById('future').style.display = 'none';

        }
    }
</script>


