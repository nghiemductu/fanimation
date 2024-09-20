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
                    foreach ($kq as $dm) {
                        echo '<option value="'.$dm['id'].'">'.$dm['ten_danh_muc'].'</option>';
                    }
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
                    <th class="col-1">ID</th>
                    <th class="col-5">Tên danh mục</th>
                    <th class="col-2">Danh mục gốc</th>
                    <th class="col-4">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function displayCategories($categories, $parent_id = 0, $level = 0) {
                    foreach ($categories as $dm) {
                        if ($dm['parent_id'] == $parent_id) {
                            echo '<tr class="text-center">
                                    <td class="align-middle col-1">'.$dm['id'].'</td>
                                    <td class="align-middle text-left col-5">'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $level).$dm['ten_danh_muc'].'</td>
                                    <td class="align-middle col-2">'.$dm['parent_id'].'</td>
                                    <td class="align-middle col-4">
                                        <div class="d-flex flex-column align-items-center">
                                            <a href="index.php?act=update_category&id='.$dm['id'].'" class="btn btn-sm btn-warning mb-2 ">Sửa</a>
                                            <a href="index.php?act=delete_category&id='.$dm['id'].'" class="btn btn-sm btn-danger " onclick="return confirm(\'Khi xóa bạn cần chắc chắn danh mục không còn chứa DỮ LIỆU SẢN PHẨM. Bạn có chắc muốn xóa danh mục này?\')">Xóa</a>
                                        </div>
                                    </td>
                                  </tr>';
                            displayCategories($categories, $dm['id'], $level + 1);
                        }
                    }
                }
                displayCategories($kq);
                ?>
            </tbody>
        </table>
    </div>
</div>