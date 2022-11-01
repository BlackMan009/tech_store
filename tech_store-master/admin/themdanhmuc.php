<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php';?>

<?php
	$dm = new danhmuc();
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$name_dm = $_POST['name_dm'];
		$them_danhmuc = $dm -> them_danhmuc($name_dm);
	}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <form action="themdanhmuc.php" method="POST" class="mx-1 mx-md-4">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" name="name_dm" placeholder="Nhập tên danh mục" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row align-items-center mb-4">
                    <input type="submit" value="Thêm Danh Mục" name="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
<?php include 'inc/footer.php'; ?>