<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   
</head>
<body>
   
    <header class="bg-primary text-white text-center py-3">
        <h1>Admin Dashboard</h1>
    </header>

    
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=danh_muc">Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=san_pham">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=hidden_items">Mục đã ẩn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=them_nguoi_dung">Thêm người dùng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=don_hang">Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=danh_gia_va_phan_hoi_khach_hang">Đánh giá và phản hồi khách hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
    