<?php
include('../lib/session.php');
Session::checkSession();
?>
<!doctype html>
<html lang="en">

<head>
  <title>Technolgy Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <script src="https://kit.fontawesome.com/10296a4c74.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>



<body>
  <header>
    <div class="px-3 py-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <img src="../img/logo.png" height="40px" alt="" style="border-bottom-left-radius: 20px; border-top-right-radius: 20px;">
          <?php
          if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            Session::destroy();
          }
          ?>
          <a href="?action=logout" class="nav-link" style="margin-left: auto;">Đăng Xuất</a>
        </div>
      </div>
    </div>
  </header>

  <main>