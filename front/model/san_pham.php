<div class="container mt-4">
    <h1 class="mb-4"><?php echo $product['ten_sp']; ?></h1>
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $product['images']; ?>" class="img-fluid" alt="<?php echo $product['ten_sp']; ?>">
        </div>
        <div class="col-md-6">
            <p><strong>Giá:</strong> <?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
            <p><strong>Số lượng hàng:</strong> <?php echo $product['so_luong_hang']; ?></p>
            <p><strong>Mô tả:</strong> <?php echo $product['mo_ta_sp']; ?></p>
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>