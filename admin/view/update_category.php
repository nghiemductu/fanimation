<div>
    <h1>Cập nhật Danh mục</h1>
    <form action="index.php?act=update_category" method="post" class="category-form">
        <input type="hidden" name="id" value="<?php echo $dm['id']; ?>">
        <input type="text" name="ten_danh_muc" value="<?php echo $dm['ten_danh_muc']; ?>" required>
        <select name="parent_id">
            <option value="0">Danh mục gốc</option>
            <?php
            foreach ($kq as $category) {
                if ($category['id'] != $dm['id']) {
                    echo '<option value="'.$category['id'].'" '.($category['id'] == $dm['parent_id'] ? 'selected' : '').'>'.$category['ten_danh_muc'].'</option>';
                }
            }
            ?>
        </select>
        <input type="submit" name="update" value="Cập nhật">
    </form>
</div>