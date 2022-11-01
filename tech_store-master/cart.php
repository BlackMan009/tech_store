<?php

use LDAP\Result;

include 'inc/header.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $id_gh = $_POST['id_gh'];
    $quantity = $_POST['quantity'];
    $sua_soluong_sp = $gh->sua_soluong_sp($id_gh, $quantity);
    if ($quantity <= 0) {
        $xoa_sp_khoi_gh = $gh->xoa_sp_khoi_gh($cartId);
    }
}
?>

<?php
if (isset($_GET['id_gh'])) {
    $id_gh = $_GET['id_gh'];
    $xoa_sp_khoi_gh = $gh->xoa_sp_khoi_gh($id_gh);
}
?>

<div class="container">
    <div class="row d-flex justify-content-center my-4">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Giỏ Hàng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $sp_trong_gh = $gh->sp_trong_gh();
                        if ($sp_trong_gh) {
                            $subtotal = 0;
                            $qty = 0;
                            while ($result = $sp_trong_gh->fetch_assoc()) {

                        ?>
                                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                        <img src="admin/uploads/<?php echo $result['image'] ?>" class="w-100" alt="" />
                                        <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-md-6 mb-4 mb-lg-0">
                                    <p><strong><?php echo $result['name_sp'] ?></strong></p>
                                    <div class="d-flex">
                                        <p>Giá : </p>
                                        <p class="text-danger mb-0" style="font-weight: bold;"><?php echo $fm->format_currency($result['price']) . '₫' ?></p>
                                    </div>
                                    <?php
                                    $total = $result['price'] * $result['quantity'];
                                    ?>
                                    <div class="d-flex">
                                        <p>Tổng : </p>
                                        <p class="text-danger mb-0" style="font-weight: bold;"><?php echo $fm->format_currency($total) . '₫' ?></p>
                                    </div>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id_gh" min="1" value="<?php echo $result['id_gh'] ?>" />
                                        <input type="number" name="quantity" min="0" value="<?php echo $result['quantity'] ?>" />
                                        <button name="submit" class="btn btn-success btn-sm me-1 mb-2"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <a href="?id_gh=<?php echo $result['id_gh'] ?>" class="btn btn-danger btn-sm me-1 mb-2"><i class="fas fa-trash"></i></a>
                                    </form>
                                    
                                </div>
                                <hr style="margin: 10px 0;">
                        <?php
                                $subtotal += $total;
                                $qty = $qty + $result['quantity'];
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="mb-0">Thanh Toán Giỏ Hàng</h5>
                </div>
                <div class="card-body">
                    <?php
                    $check_cart = $gh->sp_trong_gh();
                    if ($check_cart) {

                    ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Tiền Sản Phẩm :
                              
                                <p class="text-danger mb-0" style="font-weight: bold;"><?php echo $fm->format_currency($subtotal).'₫' ?></p>
                                    <?php
                                        Session::set('sum', $subtotal);
                                        Session::set('qty', $qty); ?>
                            </li>
                            <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Phí Vận Chuyển :
                            <span>990.000₫</span>
                            </li> -->
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Thuế (VAT) :
                                <span>10%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <strong>Tổng Tiền :</strong>
                                <?php
                                                $vat = $subtotal * 0.1;
                                                $gtotal = $subtotal + $vat;
                                                 ?>
                                <p class="text-danger mb-0" style="font-weight: bold;"><?php echo $fm->format_currency($gtotal).'₫' ?></p>
                               
                            </li>
                        </ul>
                        <div class="d-flex justify-content-center">
                            <a href="index.php" class="nav-link button" style="text-align: center;">
                               Tiếp Tục Mua
                    </a>
                            <a href="payment.php" class="nav-link button" style="text-align: center;">
                               Đăt Hàng
                    </a>
                        </div>
                    <?php
                    } else {
                        echo 'Giỏ hàng của bạn trống';
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>