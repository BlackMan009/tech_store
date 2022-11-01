<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class sanpham
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function them_sanpham($data, $files)
    {

        $name_sp = mysqli_real_escape_string($this->db->link, $data['name_sp']);
        $id_th = mysqli_real_escape_string($this->db->link, $data['id_th']);
        $id_dm = mysqli_real_escape_string($this->db->link, $data['id_dm']);
        $info_sp = mysqli_real_escape_string($this->db->link, $data['info_sp']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = 'uploads/' . $unique_image;


        if (
            $name_sp == "" || $id_th == "" || $id_dm == "" || $info_sp == ""
            || $price == "" || $type == "" || $file_name == ""
        ) {
            $alert = "Các trường không được trống";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO sanpham(name_sp, id_dm, id_th, info_sp, price, type, image) VALUES ('$name_sp','$id_dm','$id_th','$info_sp','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "Thêm sản phẩm thành công";
                return $alert;
            } else {
                $alert = "Thêm sản phẩm không thành công";
                return $alert;
            }
        }
    }

    public function show_sanpham()
    {
        if (!isset($_GET['trang'])) {
            $trang = 1;
        } else {
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang - 1) * 3;
        $query = "SELECT sanpham.*,danhmuc.name_dm,thuonghieu.name_th from sanpham inner join danhmuc on sanpham.id_dm = danhmuc.id_dm inner join thuonghieu on sanpham.id_th = thuonghieu.id_th order by id_sp asc LIMIT $tung_trang,3";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_sanpham_all()
    {
        $query = "SELECT sanpham.*,danhmuc.name_dm,thuonghieu.name_th from sanpham inner join danhmuc on sanpham.id_dm = danhmuc.id_dm inner join thuonghieu on sanpham.id_th = thuonghieu.id_th";
        $result = $this->db->select($query);
        return $result;
    }

    public function xoa_sanpham($id_sp)
    {
        $query = "DELETE FROM sanpham WHERE id_sp='$id_sp'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "Xóa thành công";
            return $alert;
        } else {
            $alert = "Xóa không thành công";
            return $alert;
        }
    }

    public function show_sanpham_page($id_sp)
    {
        $query = "SELECT sanpham.*,danhmuc.name_dm,thuonghieu.name_th from sanpham inner join danhmuc on sanpham.id_dm = danhmuc.id_dm inner join thuonghieu on sanpham.id_th = thuonghieu.id_th where sanpham.id_sp = '$id_sp'";
        $result = $this->db->select($query);
        return $result;
    }

    public function sanpham_noibat()
    {
        if (!isset($_GET['trang'])) {
            $trang = 1;
        } else {
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang - 1) * 4;
        $query = "SELECT * ,danhmuc.name_dm,thuonghieu.name_th from sanpham inner join danhmuc on sanpham.id_dm = danhmuc.id_dm inner join thuonghieu on sanpham.id_th = thuonghieu.id_th where type = '1' LIMIT $tung_trang,4";
        $result = $this->db->select($query);
        return $result;
    }

    public function sanpham_noibat_all()
    {
        $query = "SELECT * ,danhmuc.name_dm,thuonghieu.name_th from sanpham inner join danhmuc on sanpham.id_dm = danhmuc.id_dm inner join thuonghieu on sanpham.id_th = thuonghieu.id_th where type = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function sua_sanpham($data, $files, $id_sp)
    {

        $name_sp = mysqli_real_escape_string($this->db->link, $data['name_sp']);
        $id_th = mysqli_real_escape_string($this->db->link, $data['id_th']);
        $id_dm = mysqli_real_escape_string($this->db->link, $data['id_dm']);
        $info_sp = mysqli_real_escape_string($this->db->link, $data['info_sp']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = 'uploads/' . $unique_image;

        if (
            $name_sp == "" || $id_th == "" || $id_dm == "" || $info_sp == ""
            || $price == "" || $type == ""
        ) {
            $alert = "Các trường được trống";
            return $alert;
        } else {
            if (!empty($file_name)) {
                if (in_array($file_ext, $permited) === false) {
                    $alert = 'You can upload only:-' . implode('.', $permited);
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE sanpham SET name_sp='$name_sp',id_th='$id_th',id_dm='$id_dm',
            info_sp='$info_sp',price='$price',type=' $type' ,image='$unique_image' WHERE id_sp='$id_sp'";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "Sửa thành công";
                    return $alert;
                } else {
                    $alert = "Sửa không thành công";
                    return $alert;
                }
            } else {
                $query = "UPDATE sanpham SET name_sp='$name_sp',id_th='$id_th',id_dm='$id_dm',
            info_sp='$info_sp',price='$price',type=' $type' WHERE id_sp='$id_sp'";
                $result = $this->db->update($query);
                if ($result) {
                    $alert = "Sửa thành công";
                    return $alert;
                } else {
                    $alert = "Sửa không thành công";
                    return $alert;
                }
            }
        }
    }

    public function lay_sp_bang_id($id_sp)
    {
        $query = "SELECT * from sanpham where id_sp = '$id_sp'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>