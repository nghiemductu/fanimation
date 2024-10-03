<?php
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = connect_db();

    try {
        $sql = "SELECT * FROM user WHERE user_name = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id_khach_hang'];
            $_SESSION['username'] = $user['user_name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 1) {
                // User role
                header("Location: http://localhost:3000/front/index.php");
                exit();
            } else if ($user['role'] == 0) {
                // Admin role
                header("Location: http://localhost/fanimation/back/index.php");
                exit();
            }
        } else {
            $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
        }
    } catch(PDOException $e) {
        $error = "Lỗi: " . $e->getMessage();
    }

    $conn = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Đăng nhập</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form action="http://localhost:3000/front/index.php?act=login" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Chưa có tài khoản? <a href="index.php?act=register">Đăng ký</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>