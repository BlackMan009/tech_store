<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>
<?php include '../classes/sanpham.php'; ?>

<?php
$sp = new sanpham();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $them_sanpham = $sp->them_sanpham($_POST, $_FILES);
}
?>



<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form class="mx-1 mx-md-4 mt-5" action="themsanpham.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" placeholder="Tên sản phẩm" name="name_sp" />
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" placeholder="Giá sản phẩm" name="price" />
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center mb-4">
                    <select class="form-select" aria-label="Default select example" name="type">
                        <option selected>Chọn Loại Sản Phẩm</option>
                        <option value="0">Không Nổi Bật</option>
                        <option value="1">Nổi Bật</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <select class="form-select" aria-label="Default select example" name="id_dm" id="id_dm">
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
                    <select class="form-select" aria-label="Default select example" name="id_th" id="id_th">
                        <option selected>Chọn Thương Hiệu</option>
                     
                    </select>
                </div>
                
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <textarea id="editor" name="info_sp">Thông tin sản phẩm</textarea>
            </div>
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="submit" name="submit" class="btn btn-success mt-4" value="Thêm Sản Phẩm">
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>