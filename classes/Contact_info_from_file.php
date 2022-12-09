<?php 
	
	class Contact_info_from_file{
		private $db;
		private $fm;

		public function __construct(){

			$this->db = new Database();
			$this->fm = new Format();
		}

		public function import($file){
			$file = fopen($file,'r');
			while ($row = fgetcsv($file)) {
				print"<prev>";
				print_r($row);
				print"<prev>";
			}
			
		}
	}
 ?>
