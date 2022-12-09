<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
//include_once($filepath . '/../helpers/Format.php');
include_once($filepath . '/../lib/Session.php');
Session::init();
?>


<?php

class Message
{

    private $db;
    //private $fm;

    public function __construct()
    {
        $this->db = new Database();
        //$this->fm = new Format();
    }


    public function sendMessage($data)
    {
        $user_id = Session::get("admin_id");
        $template_message = mysqli_real_escape_string($this->db->link, $data['template_message']);
        $message = mysqli_real_escape_string($this->db->link, $data['message']);
        $short_code = mysqli_real_escape_string($this->db->link, $data['short_code']);
        $mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
        $date_time = mysqli_real_escape_string($this->db->link, $data['date_time']);


        if ($short_code == "" || $mobile == "") {
            $MSG = "<span class='error'> Fields must not be empty. </span>";
            return $MSG;
        }

        if ($date_time == "") {
            date_default_timezone_set('Asia/Dhaka');
            $date_time = date('Y-m-d h:i:s');
            $message_status = 1;
        } else {
            $message_status = 0;
        }

        if ($template_message == "") {

            $query = "INSERT INTO message(user_id,message,short_code,mobile,date_time,message_status) VALUES('$user_id','$message','$short_code','$mobile','$date_time','$message_status')";

        } else {

            $getTMFSend = $this->getTemplateMessageByID($template_message);
            if ($getTMFSend) {
                $i = 0;
                while ($result = $getTMFSend->fetch_assoc()) {
                    $i++;
                    $template_message = $result['message'];
                }
            }

            $query = "INSERT INTO message(user_id,message,short_code,mobile,date_time,message_status) VALUES('$user_id','$template_message','$short_code','$mobile','$date_time','$message_status')";

        }

        $result = $this->db->insert($query);


        if ($result) {
            $MSG = "<span class='success' style='color:red;'> Message Send Successfully. </span>";
            return $MSG;
        } else {

            $MSG = "<span class='success'style='color:red;'> Message Sending Failed. </span>";
            return $MSG;
        }

    }

    public function receive_message($data)
    {
        $user_id = Session::get("admin_id");
        date_default_timezone_set('Asia/Dhaka');
        $date_time = date('Y-m-d h:i:s');
        $mobile_number = mysqli_real_escape_string($this->db->link, $data['number']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);

        $query = "INSERT INTO message(user_id,message,short_code,mobile,date_time,message_status) VALUES('$user_id','$body','123',
                              '$mobile_number','$date_time','5')";

        $result = $this->db->insert($query);
    }

    public function addTemplateMessage($data)
    {
        $topic_name = mysqli_real_escape_string($this->db->link, $data['topic_name']);
        $message = mysqli_real_escape_string($this->db->link, $data['message']);


        if ($topic_name == "" || $message == "") {
            $MSG = "<span class='error'> Fields must not be empty. </span>";
            return $MSG;
        }
        $query = "INSERT INTO template_message(topic_name,message)VALUES('$topic_name','$message')";

        $result = $this->db->insert($query);

        if ($result) {
            $MSG = "<span class='success' style='color:red;'> Template Message Add Successfully. </span>";
            return $MSG;
        } else {

            $MSG = "<span class='success'style='color:red;'> Template Message Not Inserted. </span>";
            return $MSG;
        }

    }


    public function getMessage()
    {
        $user_id = Session::get("admin_id");
        $query = "SELECT * FROM message
						WHERE user_id = $user_id AND message_status = '5'
						ORDER BY id DESC LIMIT 10";
        $result = $this->db->select($query);
        return $result;
    }

    public function getReceiveMessageByNumber($number)
    {
       // $user_id = Session::get("admin_id");
        $query = "SELECT* FROM message
						WHERE 
						mobile = '$number'
						ORDER BY id ASC LIMIT 100";
        $result = $this->db->select($query);
        return $result;
    }

    public function getReceiveMessage()
    {
       // $user_id = Session::get("admin_id");
        $query = "SELECT * FROM message
						WHERE  message_status ='5'
						ORDER BY id DESC ";
        $result = $this->db->select($query);
        return $result;
    }


    public function getTemplateMessage()
    {
        $query = "SELECT* FROM template_message ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTemplateMessageForSend()
    {
        $query = "SELECT* FROM template_message";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTemplateMessageByID($id)
    {
        $query = "SELECT* FROM template_message WHERE id ='$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function updateTemplateMessage($id, $topic_name, $message)
    {
        $id = $this->fm->validation($id);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $topic_name = $this->fm->validation($topic_name);
        $topic_name = mysqli_real_escape_string($this->db->link, $topic_name);
        $message = $this->fm->validation($message);
        $message = mysqli_real_escape_string($this->db->link, $message);
        if (empty($id)) {
            $MSG = "<span class='success'>ID can't be empty. </span>";
            return $MSG;
        } elseif (empty($topic_name)) {
            $MSG = "<span class='success'> Name can't be empty. </span>";
            return $MSG;
        }
        // elseif (empty($message)) {
        // 	$MSG = "<span class='success'> Message can't be empty. </span>";
        // 	return $MSG;
        // }
        else {
            $query = "UPDATE template_message
						SET topic_name = '$topic_name',
							message    = '$message'
						WHERE id = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                $MSG = "<span class='success'> Template Message updated Successfully. </span>";
                return $MSG;
            } else {
                $MSG = "<span class='error'> Template Message Not Updated. </span>";
                return $MSG;
            }
        }
    }

    public function deleteTMessage($id)
    {
        $query = "DELETE FROM template_message
					WHERE id = '$id'";
        $DataDelete = $this->db->delete($query);
        if ($DataDelete) {
            $MSG = "<span class='success'> Message Deleted Successfully. </span>";
            return $MSG;
        } else {
            $MSG = "<span class='error'> Message Not Deleted. </span>";
            return $MSG;
        }
    }


    public function getSentMessage()
    {
        $query = "SELECT * FROM message 
						WHERE message_status = '1' 
						ORDER BY id desc";
        $result = $this->db->select($query);
        return $result;
    }

//    public function failedMessage()
//    {
//        $query = "SELECT * FROM failed_message ORDER BY id DESC";
//        $result = $this->db->select($query);
//        return $result;
//    }

    public function getScheduledMessage()
    {
        date_default_timezone_set('Asia/Dhaka');
        $date_time = date('Y-m-d h:i:s');
        $current_server_time = $date_time;
        $query = "
            			SELECT * FROM message
            			WHERE
            			date_time <= '$current_server_time' AND
            			message_status = '0'
            			ORDER BY date_time ASC
            		  ";
        $result = $this->db->select($query);
        return $result;
    }


    public function sendScheduleMessage($data)
    {
        $message = mysqli_real_escape_string($this->db->link, $data['message']);
        $short_code = mysqli_real_escape_string($this->db->link, $data['short_code']);
        $mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
        $date_time = mysqli_real_escape_string($this->db->link, $data['date_time']);
        $query = "INSERT INTO message(message,short_code,mobile,date_time) VALUES('$message','$short_code','$mobile','$date_time'
								)";
        $result = $this->db->insert($query);

    }

    public function sendMessageFromChatBox($data)
    {
        $short_code = mysqli_real_escape_string($this->db->link, $data['short_code']);
        $mobile = mysqli_real_escape_string($this->db->link, $data['mobile']);
        $date_time = mysqli_real_escape_string($this->db->link, $data['date_time']);
        $message = mysqli_real_escape_string($this->db->link, $data['message']);
        $user_id = Session::get("admin_id");
        $query = "INSERT INTO message(message,user_id,short_code,mobile,date_time,message_status) VALUES('$message','$user_id','$short_code','$mobile','$date_time','1'	)";
        $result = $this->db->insert($query);

    }

    public function updateMessageStatus($id)
    {
        $query = "UPDATE message
						SET message_status = '1'
		  			  	WHERE id = '$id'";
        $updated_row = $this->db->update($query);
        if ($updated_row) {
            $MSG = "<span class='success'> Message updated Successfully. </span>";
            return $MSG;
        } else {
            $MSG = "<span class='error'> Message Not Updated. </span>";
            return $MSG;
        }
    }

    public function deleteSentMessageById($id)
    {
        $query = "DELETE FROM message WHERE id = '$id'";
        $dataDelete = $this->db->delete($query);

        if ($dataDelete) {
            $MSG = "<span class='success'> Message Deleted Successfully. </span>";
            return $MSG;
        } else {
            $MSG = "<span class='error'> Message Not Deleted. </span>";
            return $MSG;
        }

    }

    public function deleteFailedMessageById($id)
    {
        $query = "DELETE FROM failed_message WHERE id = '$id'";
        $dataDelete = $this->db->delete($query);

        if ($dataDelete) {
            $MSG = "<span class='success'> Message Deleted Successfully. </span>";
            return $MSG;
        } else {
            $MSG = "<span class='error'> Message Not Deleted. </span>";
            return $MSG;
        }

    }

    public function deleteScheduleMessageById($id)
    {
        $query = "DELETE FROM message WHERE id = '$id'";
        $dataDelete = $this->db->delete($query);

        if ($dataDelete) {
            $MSG = "<span class='success'> Message Deleted Successfully. </span>";
            return $MSG;
        } else {
            $MSG = "<span class='error'> Message Not Deleted. </span>";
            return $MSG;
        }

    }

    public function getRecentMessageByUser()
    {
        $query = "SELECT* FROM message
            			GROUP BY mobile
             			ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

}

?>