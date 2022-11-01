<?php 
include '../classes/thuonghieu.php';
$th = new thuonghieu();
$id_dm = $_GET['id_dm']; 
?>

<?php
$th_list = $th->show_thuonghieu_ajax($id_dm);
if ($th_list) {
    while ($result = $th_list->fetch_assoc()) {
?>
        <option value="<?php echo $result['id_th'] ?>"><?php echo $result['name_th'] ?></option>
<?php
    }
}
?>