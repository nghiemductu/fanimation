<div class="container-fluid flex-grow-1 pt-4">
    <h1 class="mb-4 text-center">Quản lý Danh mục</h1>

    <form action="index.php?act=adding_category" method="post" class="category-form mb-4">
        <div class="row justify-content-center">
            <div class="col-md-2 mb-3">
                <input type="text" class="form-control" name="ten_danh_muc" placeholder="Tên danh mục" required>
            </div>
            <div class="col-md-2 mb-3">
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
        </div>
        <div class="text-center mb-3">
            <button type="submit" name="add_new" class="btn btn-primary">Thêm mới</button>
        </div>
    </form>

    
</div>

<div class="table-responsive">
        <table class="table table-striped table-hover table-bordered w-50 mx-auto">
            <thead class="thead-striped">
                <tr>
                    <th class="text-center" style="width: 15%">STT</th>
                    <th class="text-center" style="width: 55%">Tên danh mục</th>
                    <th class="text-center" style="width: 30%">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function displayCategories($categories, $parent_id = 0, $level = 0, &$stt = 1)
                {
                    foreach ($categories as $dm) {
                        if ($dm['parent_id'] == $parent_id) {
                            $bg_class = $level == 0 ? 'table-primary' : '';
                            $padding_left = 15 * $level; // 15px padding for each level
                            echo '<tr class="' . $bg_class . '">
                                    <td class="text-center align-middle">' . $stt++ . '</td>
                                    <td class="text-center align-middle">
                                        <div style="padding-left: ' . $padding_left . 'px;">
                                            ' . $dm['ten_danh_muc'] . '
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="index.php?act=update_category&id=' . $dm['id'] . '" class="btn btn-sm btn-warning mr-1">Sửa</a>
                                        <a href="index.php?act=delete_category&id=' . $dm['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Khi xóa bạn cần chắc chắn danh mục không còn chứa DỮ LIỆU SẢN PHẨM. Bạn có chắc muốn xóa danh mục này?\')">Ẩn</a>
                                    </td>
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