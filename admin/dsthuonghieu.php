<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>

<?php
$th = new thuonghieu();
if (isset($_GET['id_th'])) {
	$id_th = $_GET['id_th'];
	$xoa_thuonghieu = $th->xoa_thuonghieu($id_th);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <div class="card-header py-3">
        <h5 class="mb-0">Danh sách thương hiệu</h5>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Thương HIệu</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $th = new thuonghieu();
            $show_thuonghieu = $th->show_thuonghieu();
            if ($show_thuonghieu) {
                $i = 0;
                while ($result = $show_thuonghieu->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $result['name_th'];?></td>
                        <td><?php echo $result['name_dm'];?></td>
                        <td><a href="?id_th=<?php echo $result['id_th']?>" class="icon"><i class="fa-solid fa-trash"></i></a> || <a href="suathuonghieu.php?id_th=<?php echo $result['id_th'] ?>" class="icon"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include 'inc/footer.php'; ?>