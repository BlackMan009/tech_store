<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>
<?php include '../classes/danhmuc.php'; ?>

<?php
$th = new thuonghieu();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_th = $_POST['name_th'];
    $danhmuc = $_POST['danhmuc'];
    $them_thuonghieu = $th->them_thuonghieu($name_th,$danhmuc);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form action="themthuonghieu.php" method="POST" class="mx-1 mx-md-4">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <select class="form-select" aria-label="Default select example" name="danhmuc">
                        <option selected>Chọn Danh Mục</option>
                        <?php
                        $dm = new danhmuc();
                        $dm_list = $dm->show_danhmuc();
                        if ($dm_list) {
                            while ($result = $dm_list->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $result['id_dm'] ?>"><?php echo $result['name_dm'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" name="name_th" placeholder="Nhập tên thương hiệu" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <input type="submit" value="Thêm Thương Hiệu" name="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>