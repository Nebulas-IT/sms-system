<?php
require_once 'lib/Session.php';
require_once 'lib/Database.php';
require_once 'helpers/Format.php';

/**
 * Admin Login Class
 */
class AdminLogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function adminLogin($data)
    {
        $admin_username = mysqli_real_escape_string($this->db->link, $data['admin_username']);
        $admin_password = mysqli_real_escape_string($this->db->link, $data['admin_password']);

        if (empty($admin_username) || empty($admin_password)) {
            $MSG = "<span class='error'> Fields must not be Empty. </span>";
            return $MSG;
        }

        $query = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
        $result = $this->db->select($query);

        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set("adminLogin", true);
            Session::set("admin_id", $value['admin_id']);
            Session::set("admin_username", $value['admin_username']);
            header("location:index.php");
        } else {
            $MSG = "<span class='error'> Username or Password not matched. </span>";
            return $MSG;
        }
    }

    public function addNewUser($data)
    {
        $workshop_username = mysqli_real_escape_string($this->db->link, $data['workshop_username']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $password2 = mysqli_real_escape_string($this->db->link, $data['password2']);

        if ($password == $password2) {
            $password = md5($password);
            $query = "INSERT INTO users(workshop_username,password) VALUES ('$workshop_username','$password')";
            $result = $this->db->insert($query);
            if ($result) {
                $MSG = "<span class='success' style='color:red;'> Data Successfully Insert. </span>";
                return $MSG;
            } else {

                $MSG = "<span class='success'style='color:red;'> Data Not Inserted. </span>";
                return $MSG;
            }
        } else {
            $MSG = "<span class='error'> Password Not matched. </span>";
            return $MSG;
        }

    }
}

?>