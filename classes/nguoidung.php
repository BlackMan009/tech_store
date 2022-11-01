<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class nguoidung
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_nguoidung($id_nd){
        $query = "SELECT * from nguoidung where id_nd='$id_nd'";
        $result = $this->db->select($query);
        return $result;
    }

    public function login_nguoidung($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);

        if ($email == "" ||$pass == "") {
            $alert = "Email và Pass không được trống";
            return $alert;
        } else {
            $check_acc = "SELECT * from nguoidung where email='$email' and pass='$pass' limit 1";
            $result_check = $this->db->select($check_acc);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('id_nd',$value['id_nd']);
                Session::set('name_nd',$value['name_nd']);
                header('Location:profile.php');
            } else {
                $alert = "Email hoặc Pass không đúng";
                return $alert;
            }
        }
    }
    public function register_nguoidung($data , $files)
    {
        $name_nd = mysqli_real_escape_string($this->db->link, $data['name_nd']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, $data['pass']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = 'admin/uploads/' . $unique_image;

        if ($name_nd == "" || $file_name == "" || $email == "" || $address == "" 
        || $country == "" || $phone == "" || $pass == "" || $address == "" || $birthday == "") {
            $alert = "Các trường không được trống";
            return $alert;
        } else {
            $check_acc = "SELECT * from nguoidung where email='$email' limit 1";
            $result_check = $this->db->select($check_acc);
            if ($result_check) {
                $alert = "Email đã tồn tại";
                return $alert;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO nguoidung(name_nd, image, email, address, country, phone, pass, birthday) VALUES ('$name_nd','$unique_image','$email','$address','$country','$phone','$pass','$birthday' )";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "Đăng kí thành công";
                    return $alert;
                } else {
                    $alert = "Đăng kí không thành công";
                    return $alert;
                }
            }
        }
    }
    
    public function sua_info_nd($data, $id_nd)
    {
        $name_nd = mysqli_real_escape_string($this->db->link, $data['name_nd']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $birthday = mysqli_real_escape_string($this->db->link, $data['birthday']);

        if ($name_nd == "" ||  $email == "" || $address == "" 
        || $phone == "" || $birthday == "") {
            $alert = "Các trường không được trống";
            return $alert;
        } else {
            $query = "UPDATE nguoidung SET name_nd='$name_nd',email='$email',phone='$phone',
            address='$address',birthday='$birthday' WHERE id_nd='$id_nd'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "Sửa thành công";
                return $alert;
            } else {
                $alert = "Sửa thành công";
                return $alert;
            }
        }
    }
}
?>


