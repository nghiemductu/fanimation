<div class="container-fluid flex-grow-1">
    <h2 class="mb-4">Quản lý sản phẩm</h2>

    <!-- Form thêm sản phẩm mới -->
    <form action="index.php?act=add_san_pham" method="post" enctype="multipart/form-data" class="mb-4">
    <div class="form-row">
        <div class="form-group col-md-3 mb-3">
            <input type="text" class="form-control" name="ten_sp" placeholder="Tên sản phẩm" required>
        </div>
        <div class="form-group col-md-2 mb-3">
            <input type="text" class="form-control" name="gia" placeholder="Giá" required>
        </div>
        <div class="form-group col-md-3 mb-3">
            <select class="form-control" name="id_dm" required>
                <option value="">Chọn danh mục</option>
                <?php foreach ($dsdm as $dm): ?>
                    <option value="<?php echo $dm['id']; ?>"><?php echo $dm['ten_danh_muc']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-3 mb-3">
            <input type="file" class="form-control-file" name="imgs" required>
        </div>
        <div class="form-group col-md-1 mb-3">
            <button type="submit" name="add_new" class="btn btn-primary">Thêm mới</button>
        </div>
    </div>
    </form>
    <!-- Bảng hiển thị sản phẩm -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $item){
                    // Tìm tên danh mục tương ứng
                    $ten_danh_muc = '';
                    foreach ($dsdm as $dm) {
                        if ($dm['id'] == $item['id_danh_muc']) {
                            $ten_danh_muc = $dm['ten_danh_muc'];
                            break;
                        }
                    }
                    echo '<tr>
                            <td>'.$i.'</td>
                            <td>'.$item['ten_sp'].'</td>
                            <td><img src="'.$item['images'].'" class="img-thumbnail" style="max-width: 100px;" alt="'.$item['ten_sp'].'"></td>
                            <td>'.$ten_danh_muc.'</td>
                            <td>'.number_format($item['gia'], 0, ',', '.').' đ</td>
                            <td>
                                <a href="index.php?act=update_san_pham&id='.$item['id'].'" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="index.php?act=delete_product&id='.$item['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Bạn có chắc muốn ẩn sản phẩm này?\')">Ẩn</a>
                            </td>
                          </tr>';
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
</div>