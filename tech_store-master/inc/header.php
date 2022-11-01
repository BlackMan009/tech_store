<?php
include('lib/session.php');
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';

spl_autoload_register(function ($className) {
  include_once "classes/" . $className . ".php";
});

$db = new Database();
$fm = new Format();
$gh = new giohang();
$dm = new danhmuc();
$nd = new nguoidung();
$sp = new sanpham();
$th = new thuonghieu();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Technolgy Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="img/icon.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css.css">
  <script src="https://kit.fontawesome.com/10296a4c74.js"></script>
  <script src="script.js"></script>
</head>



<body>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="img/logo.png" height="40px" alt="" style="border-bottom-left-radius: 20px; border-top-right-radius: 20px;">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu-home" style="margin: auto;">
          <li><a href="index.php" class="nav-link px-2">Trang Chủ</a></li>
          <li><a href="#" class="nav-link px-2">Cửa Hàng</a></li>
          <li><a href="profile.php" class="nav-link px-2">Khách Hàng</a></li>
          <li><a href="#" class="nav-link px-2">Tin tức</a></li>
          <li><a href="#" class="nav-link px-2">Liên Hệ</a></li>
        </ul>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <a href="cart.php"><i class="fa-solid fa-cart-shopping cart-home"></i></a>
        </form>
      </div>
    </div>
  </header>
  <nav class="mb-4" style="background-color: #5C7373;">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
      </ul>
      <ul class="nav">
        <li class="nav-item">
          
          <?php
          if (isset($_GET['id_nd'])) {
            $id_nd = Session::get('id_nd');
            $xoa_gh_ng = $gh->xoa_gh_nd();
            Session::destroy();
          }
          ?>
          <?php
          $login_check = Session::get('customer_login');
          if ($login_check == false) {
            echo '<a href="login.php" class="nav-link px-2" style="color: white;">Đăng Nhập</a>';
          } else {
            echo '<a href="?id_nd=' . Session::get('id_nd') . '" class="nav-link px-2" style="color: white;">Đăng Xuất</a></div>';
          }
          ?>
        </li>
      </ul>
    </div>
  </nav>
  <!-- <div class="box" style="height: 80px;"></div> -->