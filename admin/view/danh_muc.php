<div class="container-fluid flex-grow-1">
    <h2 class="mb-4">Quản lý Danh mục</h2>

    <form action="index.php?act=adding_category" method="post" class="category-form mb-4">
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <input type="text" class="form-control" name="ten_danh_muc" placeholder="Tên danh mục" required>
        </div>
        <div class="col-md-4 mb-3">
            <select class="form-control" name="parent_id">
                <option value="0">Danh mục gốc</option>
                <?php
                function buildCategoryOptions($categories, $parent_id = 0, $level = 0) {
                    $result = '';
                    foreach ($categories as $dm) {
                        if ($dm['parent_id'] == $parent_id) {
                            $result .= '<option value="'.$dm['id'].'">'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).$dm['ten_danh_muc'].'</option>';
                            $result .= buildCategoryOptions($categories, $dm['id'], $level + 1);
                        }
                    }
                    return $result;
                }
                echo buildCategoryOptions($kq);
                ?>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <input type="submit" name="add_new" value="Thêm mới" class="btn btn-primary">
        </div>
    </div>
</form>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th class="col-1">STT</th>
                    <th class="col-7">Tên danh mục</th>
                    <th class="col-4">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function displayCategories($categories, $parent_id = 0, $level = 0, &$stt = 1) {
                    foreach ($categories as $dm) {
                        if ($dm['parent_id'] == $parent_id) {
                            $bg_class = $level == 0 ? 'table-primary' : '';
                            echo '<tr class="text-center '.$bg_class.'">
                                    <td class="align-middle col-1">'.$stt++.'</td>
                                    <td class="align-middle text-left col-7">'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;', $level).$dm['ten_danh_muc'].'</td>
                                    <td class="align-middle">
                                        <div class="flex-column align-items-center">
                                            <a href="index.php?act=update_category&id='.$dm['id'].'" class="btn btn-sm btn-warning mr-2 w-25">Sửa</a>
                                            <a href="index.php?act=delete_category&id='.$dm['id'].'" class="btn btn-sm btn-danger w-25" onclick="return confirm(\'Khi xóa bạn cần chắc chắn danh mục không còn chứa DỮ LIỆU SẢN PHẨM. Bạn có chắc muốn xóa danh mục này?\')">Xóa</a>
                                        </div>
                                    </td>
                                     <td class="align-middle">
                            
                                  </tr>';
                            displayCategories($categories, $dm['id'], $level + 1, $stt);
                        }
                    }
                }
                $stt = 1;
                displayCategories($kq, 0, 0, $stt);
                ?>
            </tbody>
        </table>
    </div>
</div>