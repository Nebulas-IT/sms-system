<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/lib/Session.php');
Session::init();
include 'classes/Message.php';
include 'helpers/Format.php';


$msg = new Message();
$fm = new Format();
$user_id = Session::get("admin_id");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = $_POST['number'];
//echo $number;

    if ($_POST['send'] == 1) {
        $data['message'] = $_POST['message'];
        $data['mobile'] = $number;
        $data['template_message'] = "";
        $data['short_code'] = "Chat With AJAX";
        $data['date_time'] = "";

        $messageSend = $msg->sendMessage($data);
    } else {
        $getAllMessage = $msg->getReceiveMessageByNumber($number);
        //echo "User ID: " . $user_id;
        if ($getAllMessage) {
            while ($result = $getAllMessage->fetch_assoc()) {
                if ($result['message_status'] == 5) { ?>
                    <div class="incoming_msg">
                        <div class="incoming_msg_img"><span class="fa fa-user-circle"></span></div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p id="getData"><?= $result['message'] ?></p>
                                <span class="time_date"> <?php echo $fm->inboxFormatDate($result['date_time']); ?></span>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p><?= $result['message'] ?></p>
                            <span class="time_date"> <?php echo $fm->inboxFormatDate($result['date_time']); ?></span>
                        </div>
                    </div>
                <?php }
            }
        }
    }
}
?>

