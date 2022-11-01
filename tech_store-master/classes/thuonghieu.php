<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class thuonghieu
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function them_thuonghieu($name_th,$danhmuc)
    {
        $name_th = $this->fm->validation($name_th);
        $danhmuc = $this->fm->validation($danhmuc);

        $name_th = mysqli_real_escape_string($this->db->link, $name_th);
        $danhmuc = mysqli_real_escape_string($this->db->link, $danhmuc);

        if (empty($name_th) && empty($danhmuc)) {
            $alert = "Thương hiệu không được trống";
            return $alert;
        } else {
            $query = "INSERT INTO thuonghieu(name_th,id_dm) VALUES ('$name_th','$danhmuc')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "Thêm thương hiệu thành công";
                return $alert;
            } else {
                $alert = "Thêm thương hiệu không thành công";
                return $alert;
            }
        }
    }
    public function show_thuonghieu_ajax($id_dm)
    {
        $query = "SELECT * from thuonghieu where id_dm='$id_dm'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_thuonghieu()
    {
        $query = "SELECT thuonghieu.*,danhmuc.name_dm from thuonghieu inner join danhmuc on thuonghieu.id_dm=danhmuc.id_dm";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function xoa_thuonghieu($id_th)
    {
        $query = "DELETE FROM thuonghieu WHERE id_th='$id_th'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "Xóa thành công";
            return $alert;
        } else {
            $alert = "Xóa không thành công";
            return $alert;
        }
    }

    public function sua_thuonghieu($name_th, $id_th)
    {
        $name_th = $this->fm->validation($name_th);
        $id_th = $this->fm->validation($id_th);

        $name_th = mysqli_real_escape_string($this->db->link, $name_th);
        $id_th = mysqli_real_escape_string($this->db->link, $id_th);

        if (empty($name_th)) {
            $alert = "Các trường không được trống";
            return $alert;
        } else {
            $query = "UPDATE thuonghieu SET name_th='$name_th' WHERE id_th='$id_th'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "Sủa thành công";
                return $alert;
            } else {
                $alert = "Sủa không thành công";
                return $alert;
            }
        }
    }
    public function lay_th_bang_id($id_th)
    {
        $query = "SELECT * from thuonghieu where id_th = '$id_th'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>