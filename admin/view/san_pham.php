<div class="container-fluid flex-grow-1">
    <h2 class="mb-4">Quản lý sản phẩm</h2>

   
    <form action="index.php?act=add_san_pham" method="post" enctype="multipart/form-data" class="mb-4">
    <div class="form-row">
        <div class="form-group col-md-3 mb-3">
            <input type="text" class="form-control" name="ten_sp" placeholder="Tên sản phẩm" required>
        </div>
        <div class="form-group col-md-2 mb-3">
            <input type="number" class="form-control" name="gia" placeholder="Giá" required>
        </div>
        <div class="form-group col-md-2 mb-3">
            <input type="number" class="form-control" name="so_luong_hang" placeholder="Số lượng" required>
        </div>
        <div class="form-group col-md-3 mb-3">
            <select class="form-control" name="id_dm" required>
                <option value="">Chọn danh mục</option>
                <?php foreach ($dsdm as $dm): ?>
                    <option value="<?php echo $dm['id']; ?>"><?php echo $dm['ten_danh_muc']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-2 mb-3">
            <input type="file" class="form-control-file" name="imgs" required>
        </div>
    </div>
    <div class="form-group mb-3">
        <textarea class="form-control" name="mo_ta_sp" placeholder="Mô tả sản phẩm" rows="10" cols="50"></textarea>
    </div>
                    
    <div class="form-group">
        <button type="submit" name="add_new" class="btn btn-primary">Thêm mới</button>
    </div>
    </form>

   
    <table class="table table-striped">
    <thead>
        <tr class="text-center">
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Mô tả</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($kq) && (count($kq) > 0)){
            $i = 1;
            foreach ($kq as $item){
                $ten_danh_muc = '';
                foreach ($dsdm as $dm) {
                    if ($dm['id'] == $item['id_danh_muc']) {
                        $ten_danh_muc = $dm['ten_danh_muc'];
                        break;
                    }
                }
                echo '<tr class="text-center">
                        <td class="align-middle">'.$i.'</td>
                        <td class="align-middle">'.$item['ten_sp'].'</td>
                        <td class="align-middle"><div class="d-flex justify-content-center"><img src="'.$item['images'].'" class="img-thumbnail" style="max-width: 300px;" alt="'.$item['ten_sp'].'"></div></td>
                        <td class="align-middle">'.$ten_danh_muc.'</td>
                        <td class="align-middle">'.number_format($item['gia'], 0, ',', '.').' đ</td>
                        <td class="align-middle">'.$item['so_luong_hang'].'</td>
                        <td class="align-middle">'.substr($item['mo_ta_sp'], 0, 50).'...</td>

                        <td class="align-middle">
                            <div class="d-flex flex-column align-items-center">
                                <a href="index.php?act=update_san_pham&id='.$item['id'].'" class="btn btn-sm btn-warning mb-2 w-100">Sửa</a>
                                <a href="index.php?act=delete_product&id='.$item['id'].'" class="btn btn-sm btn-danger w-100" onclick="return confirm(\'Bạn có chắc muốn ẩn sản phẩm này?\')">Ẩn</a>
                            </div>
                        </td>
                      </tr>';
                $i++;
            }
        }
        ?>
    </tbody>
</table>
</div>