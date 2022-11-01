<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classes/danhmuc.php'; ?>
<?php include '../classes/sanpham.php'; ?>
<?php include '../classes/thuonghieu.php'; ?>
<?php include_once '../helpers/format.php'; ?>

<?php
$sp = new sanpham();
$fm = new Format();
if (isset($_GET['id_sp'])) {
	$id_sp = $_GET['id_sp'];
	$xoa_sanpham = $sp->xoa_sanpham($id_sp);
}
?>

<div class="col-lg-9" style="background-color: rgb(178, 169, 169);">
    <div class="card-header py-3">
        <h5 class="mb-0">Danh sách sản phẩm</h5>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ảnh</th>
                <th>Danh mục</th>
                <th>Thương hiệu</th>
                <th>Thông tin</th>
                <th>Loại</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
				$show_sanpham = $sp-> show_sanpham();
				if($show_sanpham){
					$i=0;
					while($result = $show_sanpham -> fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX">
					<td scope=row><?php echo $i ?></td>
					<td><?php echo $result['name_sp'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80px" alt=""></td>
					<td><?php echo $result['name_dm'] ?></td>
					<td><?php echo $result['name_th'] ?></td>
					<td><?php echo $fm->textShorten($result['info_sp'],20)  ?></td>
					<td><?php 
					if($result['type'] == 0){echo 'Không Nổi Bật';}
					if($result['type'] == 1){echo 'Nổi Bật';}
					  ?></td>
					<td><a href="?id_sp=<?php echo $result['id_sp']?>" class="icon"><i class="fa-solid fa-trash"></i></a> || <a href="suasanpham.php?id_sp=<?php echo $result['id_sp']?>" class="icon"><i class="fa-solid fa-pen-to-square"></i></a></td>
				</tr>
				<?php
					}
				}
				?>
        </tbody>
    </table>
	<div class="card-header py-3">
	<?php
			$show_sanpham_all = $sp->show_sanpham_all();
			$product_count = mysqli_num_rows($show_sanpham_all);
			$product_button = ceil($product_count/4);
			for ($i = 1; $i <= $product_button; $i++) {
				echo '<a style="margin : 0 5px;" href="dssanpham.php?trang='.$i.'">'.$i.'</a>';
			}
			?>
    </div>
</div>
<?php include 'inc/footer.php'; ?>