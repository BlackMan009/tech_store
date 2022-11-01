<?php

use LDAP\Result;

include 'inc/header.php';
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check == false) {
    header('Location:login.php');
}
?>

<div class="container py-2">
      
          <div class="row">
          <?php
            $id_nd = Session::get('id_nd');
            $show_nguoidung = $nd->show_nguoidung($id_nd);
            if($show_nguoidung){
                while($result = $show_nguoidung->fetch_assoc()){
            ?>
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="admin/uploads/<?php echo $result['image'] ?>" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3"><?php echo $result['name_nd']?></h5>
                  <div class="d-flex justify-content-center mb-2">
                    <a href="editprofile.php" class="button"><i class="fa-solid fa-pen-to-square"></i> Chỉnh Sửa</a>
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
                      <p class="text-muted mb-0"><?php echo $result['name_nd']?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $result['email']?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Số Điện Thoại</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $result['phone']?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Ngày Sinh</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $result['birthday']?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Địa Chỉ</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $result['address'].','.$result['country']?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php 
                    }
                }
                ?>
        </div>

    <?php include 'inc/footer.php'; ?>