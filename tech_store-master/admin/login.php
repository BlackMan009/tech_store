<?php
include '../classes/login_admin.php';
?>
<?php
$ad_lg = new login_admin();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email_ad = $_POST['email_ad'];
  $pass_ad = $_POST['pass_ad'];
  $login_admin = $ad_lg->login_admin($email_ad, $pass_ad);
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Technolgy Shop</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="../img/icon.png">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <section class="vh-100" style="background-color: rgb(178, 169, 169);">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-8 d-none d-md-block">
                <img src="./img/login.png" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-4 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="login.php" method="POST">
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <img src="./img/logo.png" height="50px" alt="">
                    </div>
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Nhập Trang Quản Trị</h5>
                    <span><?php
                          if (isset($login_admin)) {
                            echo $login_admin;
                          }
                          ?>
                    </span>
                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example17" class="form-control form-control-lg" placeholder="Email" name="email_ad" />
                    </div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="Password" name="pass_ad" />
                    </div>

                    <div class="pt-1 mb-4">
                      <input type="submit" class="btn btn-dark btn-lg btn-block" value="Đăng Nhập">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>