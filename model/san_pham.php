<?php
    function insert_product($id_danh_muc, $ten_sp, $gia, $so_luong_hang, $mo_ta_sp, $images){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM category WHERE id = ?");
        $stmt->execute([$id_danh_muc]);
        $category = $stmt->fetch();
        if ($category) {
            $sql = "INSERT INTO products (id_danh_muc, ten_sp, gia, so_luong_hang, mo_ta_sp, images) 
                    VALUES (:id_danh_muc, :ten_sp, :gia, :so_luong_hang, :mo_ta_sp, :images)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':id_danh_muc' => $id_danh_muc,
                ':ten_sp' => $ten_sp,
                ':gia' => $gia,
                ':so_luong_hang' => $so_luong_hang,
                ':mo_ta_sp' => $mo_ta_sp,
                ':images' => $images
            ]);
        } else {
            echo "Lỗi: Danh mục không tồn tại.";
        }
    }

    function getall_sp() {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM products WHERE hien_thi_sp = 1");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function get_product($id){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        return $kq;
    }

    function update_product($id, $ten_sp, $gia, $so_luong_hang, $mo_ta_sp, $id_danh_muc, $images = "") {
        $conn = connect_db();
        if($images == "") {
            $sql = "UPDATE products SET ten_sp = :ten_sp, gia = :gia, so_luong_hang = :so_luong_hang, 
                    mo_ta_sp = :mo_ta_sp, id_danh_muc = :id_danh_muc WHERE id = :id";
        } else {
            $sql = "UPDATE products SET ten_sp = :ten_sp, gia = :gia, so_luong_hang = :so_luong_hang, 
                    mo_ta_sp = :mo_ta_sp, id_danh_muc = :id_danh_muc, images = :images WHERE id = :id";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ten_sp', $ten_sp);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':so_luong_hang', $so_luong_hang);
        $stmt->bindParam(':mo_ta_sp', $mo_ta_sp);
        $stmt->bindParam(':id_danh_muc', $id_danh_muc);
        $stmt->bindParam(':id', $id);
        if($images != "") {
            $stmt->bindParam(':images', $images);
        }
        $stmt->execute();
    }

    function delete_product($id) {
        $conn = connect_db();
        $sql = "UPDATE products SET hien_thi_sp = 0 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    
    function restore_product($id) {
        $conn = connect_db();
        $sql = "UPDATE products SET hien_thi_sp = 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function get_hidden_products() {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM products WHERE hien_thi_sp = 0");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function count_san_pham() {
        $conn = connect_db();
        $stmt = $conn->query("SELECT COUNT(*) as total FROM products");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
?>