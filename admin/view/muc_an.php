
<h1>Các mục đã ẩn</h1>

<h3>Danh mục đã ẩn</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Danh mục gốc</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hidden_categories as $dm): ?>
        <tr>
            <td><?php echo $dm['id']; ?></td>
            <td><?php echo $dm['ten_danh_muc']; ?></td>
            <td><?php echo $dm['parent_id']; ?></td>
            <td>
                <a href="index.php?act=restore_category&id=<?php echo $dm['id']; ?>" class="btn btn-sm btn-success" onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này?')">Khôi phục</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Sản phẩm đã ẩn</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($hidden_products as $sp): ?>
        <tr>
            <td><?php echo $sp['id']; ?></td>
            <td><?php echo $sp['ten_sp']; ?></td>
            <td><?php echo number_format($sp['gia'], 0, ',', '.'); ?> đ</td>
            <td>
                <a href="index.php?act=restore_product&id=<?php echo $sp['id']; ?>" class="btn btn-sm btn-success" onclick="return confirm('Bạn có chắc muốn khôi phục sản phẩm này?')">Khôi phục</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

