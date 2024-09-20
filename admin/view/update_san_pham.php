
<div class="container mt-4">
    <h2 class="mb-4">Cập nhật sản phẩm</h2>
    <form action="index.php?act=update_san_pham" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $sp['id']; ?>">
        
        <div class="form-group">
            <label for="ten_sp">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="ten_sp" name="ten_sp" value="<?php echo $sp['ten_sp']; ?>" required>
        </div>

        <div class="form-group">
            <label for="gia">Giá:</label>
            <input type="number" class="form-control" id="gia" name="gia" value="<?php echo $sp['gia']; ?>" required>
        </div>

        <div class="form-group">
            <label for="id_dm">Danh mục:</label>
            <select class="form-control" id="id_dm" name="id_dm">
                <?php foreach ($dsdm as $dm): ?>
                    <option value="<?php echo $dm['id']; ?>" <?php if ($dm['id'] == $sp['id_danh_muc']) echo 'selected'; ?>>
                        <?php echo $dm['ten_danh_muc']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="imgs">Hình ảnh:</label>
            <input type="file" class="form-control-file" id="imgs" name="imgs">
            <?php if (!empty($sp['images'])): ?>
                <img src="<?php echo $sp['images']; ?>" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            <?php endif; ?>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

<?php
    echo '</div>'; // Đóng container-fluid từ header
    echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>';
    echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>';
    echo '</body></html>';
?>