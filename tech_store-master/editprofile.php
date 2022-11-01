<?php
include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
  header('Location:login.php');
}
?>

<?php
$id_nd = Session::get('id_nd');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
  $sua_info_nd = $nd->sua_info_nd($_POST, $id_nd);
}
?>

<div class="container py-2">
<form action="" method="POST">
  <div class="row">
    <?php
    $id_nd = Session::get('id_nd');
    $show_nguoidung = $nd->show_nguoidung($id_nd);
    if ($show_nguoidung) {
      while ($result = $show_nguoidung->fetch_assoc()) {
    ?>
       
        <div class="col-lg-4">
            <div class="card mb-4">
              <div class="card-body text-center">
                <img src="admin/uploads/<?php echo $result['image'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?php echo $result['name_nd'] ?></h5>
                <div class="d-flex justify-content-center mb-2">
                  <input type="submit" value="Chỉnh Sửa" name="save" class="button">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Thông Tin Khách Hàng</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Tên Đầy Đủ</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="name_nd" value="<?php echo $result['name_nd'] ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="email" value="<?php echo $result['email'] ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Số Điện Thoại</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="phone" value="<?php echo $result['phone'] ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Ngày Sinh</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="date" name="birthday" value="<?php echo $result['birthday'] ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Địa Chỉ</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="address" value="<?php echo $result['address'] ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
       
  </div>
  </form>
<?php
      }
    }
?>
</div>

<?php include 'inc/footer.php'; ?>