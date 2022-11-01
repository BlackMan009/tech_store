<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class danhmuc
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function them_danhmuc($name_dm)
    {
        $name_dm = $this->fm->validation($name_dm);

        $name_dm = mysqli_real_escape_string($this->db->link, $name_dm);

        if (empty($name_dm)) {
            $alert = "Danh mục không được trống";
            return $alert;
        } else {
            $query = "INSERT INTO danhmuc(name_dm) VALUES ('$name_dm')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "Thêm danh mục thành công";
                return $alert;
            } else {
                $alert = "Thêm danh mục không thành công";
                return $alert;
            }
        }
    }
    public function show_danhmuc()
    {
        $query = "SELECT * from danhmuc order by id_dm asc";
        $result = $this->db->select($query);
        return $result;
    }

    public function xoa_danhmuc($id_dm)
    {
        $query = "DELETE FROM danhmuc WHERE id_dm='$id_dm'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "Xóa thành công";
            return $alert;
        } else {
            $alert = "Xóa không thành công";
            return $alert;
        }
    }
    
    public function lay_dm_bang_id($id_dm)
    {
        $query = "SELECT * from danhmuc where id_dm = '$id_dm'";
        $result = $this->db->select($query);
        return $result;
    }
    public function sua_danhmuc($name_dm, $id_dm)
    {
        $name_dm = $this->fm->validation($name_dm);
        $id_dm = $this->fm->validation($id_dm);

        $name_dm = mysqli_real_escape_string($this->db->link, $name_dm);
        $id_dm = mysqli_real_escape_string($this->db->link, $id_dm);

        if (empty($name_dm)) {
            $alert = "Các trường không được trống";
            return $alert;
        } else {
            $query = "UPDATE danhmuc SET name_dm='$name_dm' WHERE id_dm='$id_dm'";
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
    
}
?>