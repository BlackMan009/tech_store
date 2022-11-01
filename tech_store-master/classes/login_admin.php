<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');;
?>

<?php
class login_admin
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($email_ad, $pass_ad)
    {
        $email_ad = $this->fm->validation($email_ad);
        $pass_ad = $this->fm->validation($pass_ad);

        $email_ad = mysqli_real_escape_string($this->db->link, $email_ad);
        $pass_ad = mysqli_real_escape_string($this->db->link, $pass_ad);

        if (empty($email_ad) || empty($pass_ad)) {
            $alert = 'User and Pass must be not empty';
            return $alert;
        } else {
            $query = "SELECT * from admin where email_ad = '$email_ad' and pass_ad = '$pass_ad' limit 1 ";
            $result = $this->db->select($query);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('adminlogin', true);
                Session::set('id_ad', $value['id_ad']);
                Session::set('email_ad', $value['email_ad']);
                Session::set('name_ad', $value['name_ad']);
            } else {
                $alert = 'Wrong username or password';
                return $alert;
            }
        }
    }
}
?>