<?php

use LDAP\Result;

include 'inc/header.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

    $login_nguoidung = $nd->login_nguoidung($_POST);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['regeter'])) {

    $register_nguoidung = $nd->register_nguoidung($_POST, $_FILES);
}
?>

<?php
$login_check = Session::get('customer_login');
if ($login_check) {
    header('Location:profile.php');
}
?>

<div class="container" style="margin-bottom: 10px;">
    <div class="row ">
        <div class="col-lg-4">
            <div class="card mb-4 bg-dark text-white">
                <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Nhập</p>
                <form class="mx-1 mx-md-4" method="POST">

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="text" id="form3Example1c" class="form-control" placeholder="Email" name="email" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                            <input type="password" id="form3Example4c" class="form-control" placeholder="Password" name="pass" />
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <input type="submit" class="mt-4 button" name="login" value="Đăng Nhập">
                    </div>

                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card bg-dark text-white">
                <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký</p>

                <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example1c" class="form-control" placeholder="Họ Tên" name="name_nd" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example4c" class="form-control" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example4c" class="form-control" placeholder="Địa chỉ" name="address" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <select class="form-select" aria-label="Default select example" name="country">
                                    <option selected>Viet Nam</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="text" id="form3Example1c" class="form-control" placeholder="Điện Thoại" name="phone" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="password" id="form3Example4c" class="form-control" placeholder="Mật Khẩu" name="pass" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="date" id="form3Example4c" class="form-control" name="birthday" />
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mb-4">
                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div class="form-outline flex-fill mb-0">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <input type="submit" class="mt-4 button" name="regeter" value="Đăng Kí">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>