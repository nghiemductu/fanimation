<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thumbnail-small {
            width: 80px;
            height: 80px;
            margin-right: 5px;
        }

        .similar-product img {
            width: 150px;
            height: 150px;
            margin-right: 20px;
        }

        .stock-status {
            padding: 10px 15px; /* Giảm padding để nút nhỏ hơn */
            background-color: #28a745; /* Màu xanh lá cây cho trạng thái còn hàng */
            color: white;
            font-weight: bold;
            border-radius: 5px;
            font-size: 14px; /* Kích thước phông chữ */
        }

        .btn-custom {
            font-size: 14px; /* Đặt cùng kích thước phông chữ với nút trạng thái */
            padding: 10px 15px; /* Giảm kích thước của nút "Thêm vào giỏ hàng" */
            font-weight: bold;
        }

        .product-image-container {
            position: relative;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <?php
       
            if (isset($product)) {
                $images = json_decode($product['images'], true);
                $first_image = $images[0] ?? '/img/default-product.jpg';
        ?>
        <div class="row">
            <div class="col-md-8 product-image-container">
                <img src="<?php echo $first_image; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['ten_sp']); ?>">
                
                <div class="d-flex justify-content-start mt-5">
                    <?php foreach ($images as $image): ?>
                        <img src="<?php echo $image; ?>" class="img-thumbnail thumbnail-small" alt="<?php echo htmlspecialchars($product['ten_sp']); ?>">
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-4">
                <h3><?php echo htmlspecialchars($product['ten_sp']); ?></h3>
                <p class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?>₫</p>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Performance</th>
                            <td><?php echo htmlspecialchars($product['performance']); ?></td>
                        </tr>
                        <tr>
                            <th>Number of wings</th>
                            <td><?php echo htmlspecialchars($product['number_of_wings']); ?></td>
                        </tr>
                        <tr>
                            <th>Technology</th>
                            <td><?php echo htmlspecialchars($product['technology']); ?></td>
                        </tr>
                        <tr>
                            <th>Speed</th>
                            <td><?php echo htmlspecialchars($product['speed']); ?></td>
                        </tr>
                        <tr>
                            <th>Material</th>
                            <td><?php echo htmlspecialchars($product['material']); ?></td>
                        </tr>
                        <tr>
                            <th>Function</th>
                            <td><?php echo htmlspecialchars($product['function']); ?></td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Nút Thêm vào giỏ hàng và Trạng thái -->
                <div class="d-flex justify-content-between mt-3">
                    <button class="btn btn-primary btn-md btn-custom">Thêm vào giỏ hàng</button>
                    <div class="stock-status">Trạng thái: Còn hàng</div>
                </div>
            </div>
        </div>

        <!-- Phần sản phẩm tương tự -->
        <div class="container mt-5">
            <h4 class="text-center">SẢN PHẨM TƯƠI TƯƠI</h4>
            <div class="row text-center mt-5">
                <!-- Sản phẩm 1 -->
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER HARMONY 50964">
                    <p class="product-name">HUNTER HARMONY 50964</p>
                </div>
                <!-- Sản phẩm 2 -->
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="BEACON HILL - BN">
                    <p class="product-name">BEACON HILL – BN</p>
                </div>
                <!-- Sản phẩm 3 -->
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER INDUSTRIE II 24545">
                    <p class="product-name">HUNTER INDUSTRIE II 24545</p>
                </div>
                <!-- Sản phẩm 4 -->
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER ARCOT 50647 – WH">
                    <p class="product-name">HUNTER ARCOT 50647 – WH</p>
                </div>
            </div>

            <div class="row text-center mt-4">
                <!-- Sản phẩm 5 -->
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER CLAUDETTE">
                    <p class="product-name">HUNTER CLAUDETTE</p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER SAVOY 24520">
                    <p class="product-name">HUNTER SAVOY 24520</p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER SEVILLE II 24038">
                    <p class="product-name">HUNTER SEVILLE II 24038</p>
                </div>
                <div class="col-md-3 col-6">
                    <img src="https://via.placeholder.com/200" class="product-img" alt="HUNTER SAVOY 24525">
                    <p class="product-name">HUNTER SAVOY 24525</p>
                </div>
            </div>
        </div>
        <?php
        } else {
            echo "<p>Sản phẩm không tồn tại.</p>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>