<div class="container-fluid mt-4">
   <h1 class="mb-4">Quản lý Danh mục</h1>
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

    <?php
    function displayCategories($categories, $parent_id = 0, $level = 0) {
        foreach ($categories as $dm) {
            if ($dm['parent_id'] == $parent_id) {
                echo '<tr>
                        <td>'.$dm['id'].'</td>
                        <td>'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $level).$dm['ten_danh_muc'].'</td>
                        <td>'.$dm['parent_id'].'</td>
                        <td class="action-links">
                            <a href="index.php?act=update_category&id='.$dm['id'].'" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="index.php?act=delete_category&id='.$dm['id'].'" class="btn btn-sm btn-danger" onclick="return confirm(\'Bạn có chắc muốn xóa danh mục này?\')">Xóa</a>
                        </td>
                      </tr>';
                displayCategories($categories, $dm['id'], $level + 1);
            }
        }
    }
    ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Danh mục cha</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php displayCategories($kq); ?>
            </tbody>
        </table>
    </div>
</div>