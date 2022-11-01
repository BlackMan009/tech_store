<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php';?>

<?php
if (isset($_GET['id_dm']) || $_GET['id_dm'] != NULL) {
    $id_dm = $_GET['id_dm'];
}
$dm = new danhmuc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_dm = $_POST['name_dm'];

    $sua_danhmuc = $dm->sua_danhmuc($name_dm, $id_dm);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form action="" method="POST" class="mx-1 mx-md-4">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <?php
                        $dm_list = $dm->lay_dm_bang_id($id_dm);
                        if ($dm_list) {
                            while ($result = $dm_list->fetch_assoc()) {
                        ?>
                              <input type="text" id="form3Example1c" class="form-control" name="name_dm" value="<?php echo $result['name_dm'] ?>" />  
                        <?php
                            }
                        }
                        ?>    
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <input type="submit" value="Sủa Danh Mục" name="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>