<h1 class="mb-5">Các mục đã ẩn</h1>

<h3 class="mt-5 mb-4">Danh mục đã ẩn</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th style="width: 10%;">STT</th>
                <th style="width: 40%;">Tên danh mục</th>
                <th style="width: 20%;">Danh mục gốc</th>
                <th style="width: 30%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt_category = 1; ?>
            <?php foreach ($hidden_categories as $dm): ?>
            <tr class="text-center">
                <td class="align-middle"><?php echo $stt_category++; ?></td>
                <td class="align-middle text-left"><?php echo $dm['ten_danh_muc']; ?></td>
                <td class="align-middle"><?php echo $dm['parent_id']; ?></td>
                <td class="align-middle">
                    <a href="index.php?act=restore_category&id=<?php echo $dm['id']; ?>" class="btn btn-sm btn-success w-25" onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này?')">Khôi phục</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<hr class="my-5">

<h3 class="mt-5 mb-4">Sản phẩm đã ẩn</h3>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th style="width: 10%;">STT</th>
                <th style="width: 40%;">Tên sản phẩm</th>
                <th style="width: 20%;">Giá</th>
                <th style="width: 30%;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt_product = 1; ?>
            <?php foreach ($hidden_products as $sp): ?>
            <tr class="text-center">
                <td class="align-middle"><?php echo $stt_product++; ?></td>
                <td class="align-middle text-left"><?php echo $sp['ten_sp']; ?></td>
                <td class="align-middle"><?php echo number_format($sp['gia'], 0, ',', '.'); ?> đ</td>
                <td class="align-middle">
                    <a href="index.php?act=restore_product&id=<?php echo $sp['id']; ?>" class="btn btn-sm btn-success w-25" onclick="return confirm('Bạn có chắc muốn khôi phục sản phẩm này?')">Khôi phục</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>