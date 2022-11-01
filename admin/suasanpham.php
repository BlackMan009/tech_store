<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>
<?php include '../classes/sanpham.php'; ?>

<?php
if (isset($_GET['id_sp']) || $_GET['id_sp'] != NULL) {
    $id_sp = $_GET['id_sp'];
}

$sp = new sanpham();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $sua_sanpham = $sp->sua_sanpham($_POST, $_FILES, $id_sp);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form class="mx-1 mx-md-4 mt-5" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <?php
            $lay_sp_bang_id = $sp->lay_sp_bang_id($id_sp);
            if ($lay_sp_bang_id) {        
                while ($result = $lay_sp_bang_id->fetch_assoc()) {
            ?>
                    <div class="col-lg-6">
                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" class="form-control" value="<?php echo $result['name_sp'] ?>" name="name_sp" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" class="form-control" value="<?php echo $result['price'] ?>" name="price" />
                            </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <select class="form-select" aria-label="Default select example" name="type">
                                <option selected>Chọn Loại Sản Phẩm</option>
                                <?php if ($result['type'] == 0) {
                                ?>
                                    <option selected value="0">Không Nổi Bật</option>
                                    <option value="1">Nổi Bật</option>
                                <?php }
                                if ($result['type'] == 1) { ?>

                                    <option value="0">Không Nổi Bật</option>
                                    <option selected value="1">Nổi Bật</option>
                                <?php }
                                ?>
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
                                    while ($result_dm = $dm_list->fetch_assoc()) {
                                ?>
                                        <option <?php if ($result_dm['id_dm'] == $result['id_dm']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $result_dm['id_dm'] ?>"><?php echo $result_dm['name_dm'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <select class="form-select" aria-label="Default select example" name="id_th" id="id_th">
                                <option selected>Chọn Thương Hiệu</option>
                                <?php
                                $th = new thuonghieu();
                                $th_list = $th->show_thuonghieu($id_dm);
                                if ($th_list) {
                                    while ($result_th = $th_list->fetch_assoc()) {
                                ?>
                                        <option <?php if ($result['id_th'] == $result_th['id_th']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $result_th['id_th'] ?>"><?php echo $result_th['name_th'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <textarea id="editor" name="info_sp"><?php echo $result['info_sp'] ?></textarea>
                    </div>
                    <div class="col-lg-6">
                        <img src="uploads/<?php echo $result['image'] ?>" width="80px" alt="">
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" name="submit" class="btn btn-success mt-4" value="Sửa Sản Phẩm" />
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>