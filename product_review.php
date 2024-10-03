<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/fanimation/database/connect_db.php';
require_once 'back/model/san_pham.php';
require_once 'back/model/review.php';
require_once 'back/model/user.php';  


$product_id = 1;
$username = 'tu12';

// Lấy thông tin sản phẩm
$product = get_product($product_id);

// Lấy thông tin user
$user = get_user_by_username($username);

if (!$product || !$user) {
    $error_message = "Không tìm thấy sản phẩm hoặc người dùng.";
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $danh_gia = $_POST['danh_gia'];
        $binh_luan = $_POST['binh_luan'];
        $id_khach_hang = $user['id'];

        if (add_review($product_id, $id_khach_hang, $danh_gia, $binh_luan)) {
            $success_message = "Đánh giá của bạn đã được gửi thành công!";
        } else {
            $error_message = "Có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php else: ?>
            <h1 class="mb-4">Đánh giá sản phẩm: <?php echo htmlspecialchars($product['ten_sp']); ?></h1>
            <p>Người dùng: <?php echo htmlspecialchars($username); ?></p>
            
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <form action="" method="POST" class="mb-4">
                <div class="form-group">
                    <label for="danh_gia">Đánh giá:</label>
                    <select name="danh_gia" id="danh_gia" class="form-control" required>
                        <option value="1">1 sao</option>
                        <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="binh_luan">Bình luận:</label>
                    <textarea name="binh_luan" id="binh_luan" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>