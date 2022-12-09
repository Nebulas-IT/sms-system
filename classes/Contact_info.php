<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>


<?php 

	class Contact_info{
		private $db;
		private $fm;

		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();
		}


		public function addContact($data){

			$first_name     = mysqli_real_escape_string($this->db->link, $data['first_name']);
			$last_name      = mysqli_real_escape_string($this->db->link, $data['last_name']);
			$ccode    		= mysqli_real_escape_string($this->db->link, $data['ccode']);
			$mobile          = mysqli_real_escape_string($this->db->link, $data['mobile']);
			$birth_day	    = mysqli_real_escape_string($this->db->link, $data['birth_day']);
			
			if ($first_name == "" || $last_name == "" || $ccode == "" || $mobile == "" || $birth_day=="") {
				$MSG = "<span class='error'> Fields must not be empty. </span>";
				return $MSG;
			}

			$query = "INSERT INTO contact_info(first_name, last_name, ccode, mobile,birth_day) 
				VALUES('$first_name', '$last_name', '$ccode', '$mobile', '$birth_day')";

				$insertRow = $this->db->insert($query);

				if ($insertRow) {
					$MSG = "<span class='success'> Contact Info inserted Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Contact Info not inserted Successfully. </span>";
					return $MSG;
				}
		}


		public function getAllContact(){
			$query = "SELECT* FROM contact_info ORDER BY id DESC";
			$result =$this->db->select($query);
			return $result;
		}

		public function deleteContactById($id){
			$query = "DELETE FROM contact_info WHERE id = '$id'";
			$dataDelete = $this->db->delete($query);

            if ($dataDelete) {
                $MSG = "<span class='success'> Contact Deleted Successfully. </span>";
                return $MSG;
            }
            else {
                $MSG = "<span class='error'> Contact Not Deleted. </span>";
                return $MSG;
            }

		}
	}


 ?>