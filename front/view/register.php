<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = connect_db();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

   
    if ($password !== $confirm_password) {
        die("Mật khẩu và xác nhận mật khẩu không khớp!");
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql = "INSERT INTO user (user_name, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
        } else {
            echo "Lỗi: " . $stmt->errorInfo()[2];
        }
    } catch(PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    $conn = null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Đăng ký</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <?php if (isset($success)): ?>
                            <div class="alert alert-success"><?php echo $success; ?></div>
                        <?php endif; ?>
                        <form action="index.php?act=register" method="post" id="registerForm">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Đã có tài khoản? <a href="index.php?act=login">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>