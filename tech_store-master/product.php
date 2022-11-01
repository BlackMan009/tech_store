<?php

use LDAP\Result;

include 'inc/header.php';
?>

<?php
if (isset($_GET['id_sp']) || $_GET['id_sp'] != NULL) {
    $id_sp = $_GET['id_sp'];
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $themvaogiohang = $gh->themvaogiohang($id_sp, $quantity);
}
?>

<div class="container mt-3 mb-3">
    <div class="row d-flex justify-content-center">
        <?php
        $show_sanpham_page = $sp->show_sanpham_page($id_sp);
        if ($show_sanpham_page) {
            while ($result = $show_sanpham_page->fetch_assoc()) {

        ?>
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="admin/uploads/<?php echo $result['image'] ?>" width="250" /> </div>
                                    <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-vang-200x200.jpg" width="70"> <img onclick="change_image(this)" src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-xam-128gb-200x200.jpg" width="70"><img onclick="change_image(this)" src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-xanh-200x200.jpg" width="70"><img onclick="change_image(this)" src="https://cdn.tgdd.vn/Products/Images/42/258047/samsung-galaxy-z-flip4-5g-128gb-thumb-tim-200x200.jpg" width="70">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo $result['name_dm'] ?></span>
                                        <h5 class="text-uppercase"><?php echo $result['name_sp'] ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"><?php echo $fm->format_currency($result['price']).'₫' ?></span>
                                        </div>
                                    </div>
                                    <p class="about"><?php echo $result['info_sp'] ?>
                                    </p>
                                    <div class="sizes mt-2">
                                        <h6 class="text-uppercase">Bộ nhớ</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>128GB</span> </label> <label class="radio">
                                            <input type="radio" name="size" value="M"> <span>256GB</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>512GB</span>
                                        </label>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="sizes mt-2">
                                            <h6 class="text-uppercase">Số lượng</h6>
                                            <input type="number" name="quantity" value="1" min="1">
                                        </div>
                                        <div class="cart mt-4 align-items-center">
                                            <input type="submit" class="btn btn-danger text-uppercase mr-2 px-4" name="submit" value="Add to cart" />
                                        </div>
                                    </form>
                                    <?php if(isset($themvaogiohang))
                                    echo $themvaogiohang?>
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
</div>

<?php include 'inc/footer.php'; ?>