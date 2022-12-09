<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Search Class
*/
class Search
{
	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function searchContact($data)
	{	
		$search   = mysqli_real_escape_string($this->db->link, $data['search']);
		$search = '%'.$search.'%';
		
		$query = "SELECT * FROM `contact_info` WHERE CONCAT(first_name,last_name,ccode,mobile,birth_day) LIKE '$search'";
		$result = $this->db->select($query);
		return $result;
	}


    public function searchSentMessage($data)
    {
        $search   = mysqli_real_escape_string($this->db->link, $data['search']);
        $search = '%'.$search.'%';

        $query = "SELECT * FROM `message` WHERE CONCAT(mobile,message,short_code) LIKE '$search'";
        $result = $this->db->select($query);
        return $result;
    }

    public function searchFailedMessage($data)
    {
        $search   = mysqli_real_escape_string($this->db->link, $data['search']);
        $search = '%'.$search.'%';

        $query = "SELECT * FROM `failed_message` WHERE CONCAT(recipient,message) LIKE '$search'";
        $result = $this->db->select($query);
        return $result;
    }

    public function searchScheduleMessage($data)
    {
        $search   = mysqli_real_escape_string($this->db->link, $data['search']);
        $search = '%'.$search.'%';

        $query = "SELECT * FROM `schedule_message` WHERE CONCAT(recipient,message) LIKE '$search'";
        $result = $this->db->select($query);
        return $result;
    }

    public function searchTemplateMessage($data)
    {
        $search   = mysqli_real_escape_string($this->db->link, $data['search']);
        $search = '%'.$search.'%';

        $query = "SELECT * FROM `template_message` WHERE CONCAT(topic_name,message) LIKE '$search'";
        $result = $this->db->select($query);
        return $result;
    }


}

?>