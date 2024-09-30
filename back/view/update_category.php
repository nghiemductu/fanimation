<div class="container-fluid flex-grow-1 pt-4">
    <h1 class="mb-4 text-center">Cập nhật Danh mục</h1>

    <form action="index.php?act=update_category" method="post" class="mb-4">
        <input type="hidden" name="id" value="<?php echo $dm['id']; ?>">
        
        <div class="row justify-content-center">
            <div class="col-md-2 mb-3">
                <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="<?php echo $dm['ten_danh_muc']; ?>" required>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-md-2 mb-3">
                <label for="parent_id" class="form-label">Danh mục cha</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="0">Danh mục gốc</option>
                    <?php
                    foreach ($kq as $category) {
                        if ($category['id'] != $dm['id']) {
                            echo '<option value="'.$category['id'].'" '.($category['id'] == $dm['parent_id'] ? 'selected' : '').'>'.$category['ten_danh_muc'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="text-center mb-3">
            <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>