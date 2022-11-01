<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>
<?php include '../classes/danhmuc.php'; ?>

<?php
if (isset($_GET['id_th']) || $_GET['id_th'] != NULL) {
    $id_th = $_GET['id_th'];
}
$th = new thuonghieu();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_th = $_POST['name_th'];

    $sua_thuonghieu = $th->sua_thuonghieu($name_th, $id_th);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form action="" method="POST" class="mx-1 mx-md-4">
        <div class="row mt-5">
            <div class="col-lg-6">
                
                    
                        
                    

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <?php
                        $th_list = $th->lay_th_bang_id($id_th);
                        if ($th_list) {
                            while ($result = $th_list->fetch_assoc()) {
                        ?>
                              <input type="text" id="form3Example1c" class="form-control" name="name_th" value="<?php echo $result['name_th'] ?>" />  
                        <?php
                            }
                        }
                        ?>    
                    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <input type="submit" value="Sủa Thương Hiệu" name="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>