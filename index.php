<?php

use LDAP\Result;

include 'inc/header.php';
include 'inc/slider.php';
?>
<style>
  
</style>

<div class="text-center container py-3">
  <h3 class="mt-4 mb-5">Sản Phẩm Nổi Bật</h3>

  <div class="row">
    <?php
    $sanpham_noibat = $sp->sanpham_noibat();
    if ($sanpham_noibat) {
      while ($result_noibat = $sanpham_noibat->fetch_assoc()) {

    ?>
        <div class="col-md-12 col-lg-3 mb-4 mb-lg-0">
          <div class="card">
            <div class="d-flex justify-content-between p-3 product-top">
              <img src="admin/uploads/<?php echo $result_noibat['image'] ?>" class="card-img-top" alt="" />
              <a href="product.php?id_sp=<?php echo $result_noibat['id_sp'] ?>" class="nav-link"><i class="fa-solid fa-eye view-page"></i></a>
             
            </div>

            <div class="card-body">
              <div class="d-flex justify-content-between py-2">
                <p class="text-dark mb-0"><?php echo $result_noibat['name_dm'] ?></p>
                <p class="text-dark mb-0"><?php echo $result_noibat['name_th'] ?></p>
              </div>

              <div class="d-flex justify-content-between mb-2">
                <h6 class="mb-0"><?php echo $result_noibat['name_sp'] ?></h6>
                <h6 class="text-danger mb-0"><?php echo $fm->format_currency($result_noibat['price']).'₫' ?></h6>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <div class="card-header py-4 d-flex justify-content-center">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php
        $sanpham_noibat_all = $sp->sanpham_noibat_all();
        $product_count = mysqli_num_rows($sanpham_noibat_all);
        $product_button = ceil($product_count / 4);
        for ($i = 1; $i <= $product_button; $i++) {
        ?>
          <li class="page-item"><a class="page-link" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
        }
        ?>
      </ul>
    </nav>
  </div>
</div>

<?php
include 'inc/footer.php';
?>