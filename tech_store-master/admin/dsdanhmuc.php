<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php'; ?>

<?php
$dm = new danhmuc();
if (isset($_GET['id_dm'])) {
	$id_dm = $_GET['id_dm'];
	$xoa_danhmuc = $dm->xoa_danhmuc($id_dm);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <div class="card-header py-3">
        <h5 class="mb-0">Danh sách danh mục</h5>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dm = new danhmuc();
            $show_danhmuc = $dm->show_danhmuc();
            if ($show_danhmuc) {
                $i = 0;
                while ($result = $show_danhmuc->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <th scope="row"><?php echo $i;?></th>
                        <td><?php echo $result['name_dm'];?></td>
                        <td><a href="?id_dm=<?php echo $result['id_dm']?>" class="icon"><i class="fa-solid fa-trash"></i></a> || <a href="suadanhmuc.php?id_dm=<?php echo $result['id_dm'] ?>" class="icon"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include 'inc/footer.php'; ?>