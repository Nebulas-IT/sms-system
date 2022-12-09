<?php
include 'classes/Message.php';
require_once __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;

$msg = new Message();

$message_send = 0;

$getSentMessage = $msg->getScheduledMessage();

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

if ($getSentMessage) {
    echo "<table>";
    while ($result = $getSentMessage->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $result['message'] . '</td>';
        echo '<td>' . $result['short_code'] . '</td>';
        echo '<td>' . $result['mobile'] . '</td>';
        echo '<td>' . $result['date_time'] . '</td>';

//        This part is only important here
      //  $messageSendStatus = send_message($result['mobile'], $result['message']);
        $updateStatus = $msg->updateMessageStatus($result['id']);
//        END of This part is only important here
       // echo '<td>' . $messageSendStatus . '</td>';
        //echo '<td>' . $updateStatus . '</td>';
        echo '</tr>';
    }
    echo "</table>";
}
?>
