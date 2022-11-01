<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>

<?php
class giohang
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function themvaogiohang($id_sp, $quantity)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id_sp = mysqli_real_escape_string($this->db->link, $id_sp);
        $sId= session_id();

        $query = "SELECT * from sanpham where id_sp = '$id_sp'";
        $result = $this->db->select($query)->fetch_assoc();

        $image = $result['image'];
        $name_sp = $result['name_sp'];
        $price = $result['price'];

        $query_cart = "SELECT * from giohang where id_sp = '$id_sp' and sId = '$sId'";
        $check_cart =  $this->db->select($query_cart); 
        if($check_cart){
            $msg = 'Sản phẩm đã có trong giỏ hàng';
            return $msg;
        } else{
            $query_insert = "INSERT INTO giohang(id_sp, sId, name_Sp, quantity, image ,price) VALUES ('$id_sp','$sId','$name_sp','$quantity','$image','$price')";
            $insert_cart = $this->db->insert($query_insert);
            if ($result) {
                header('Location:cart.php');
            }
        } 
    }

    public function xoa_sp_khoi_gh($id_gh){
        $id_gh = mysqli_real_escape_string($this->db->link, $id_gh);
        $query = "DELETE FROM giohang WHERE id_gh ='$id_gh'";
        $result = $this->db->delete($query);
    }

    public function sua_soluong_sp($id_gh, $quantity){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id_gh = mysqli_real_escape_string($this->db->link, $id_gh);
        $query = "UPDATE giohang SET quantity='$quantity' WHERE id_gh='$id_gh'";
        $result = $this->db->update($query);
        if($result){
            header('Location:cart.php');
        } else {
            $msg = 'Sửa số lượng không thành công';
            return $msg;
        }
    }

    public function sp_trong_gh(){
        $sId = session_id();
        $query = "SELECT * from giohang where sId = '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function xoa_gh_nd(){
        $sId = session_id();
        $query = "DELETE from giohang where sId = '$sId'";
        $result = $this->db->delete($query);
        return $result;
    }
    
}
?>