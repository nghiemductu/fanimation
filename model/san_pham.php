<?php
    function insert_product($id_danh_muc, $ten_sp, $gia, $images){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM tbl_category WHERE id = ?");
        $stmt->execute([$id_danh_muc]);
        $category = $stmt->fetch();
        if ($category) {
           
            $sql = "INSERT INTO tbl_product (id_danh_muc, ten_sp, gia, images) VALUES ('$id_danh_muc', '$ten_sp', '$gia', '$images')";
            $conn->exec($sql);
        } else {
            echo "Lỗi: Danh mục không tồn tại.";
        }
    }
    function getall_sp() {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE hien_thi_sp = 1");
        $stmt->execute();
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function get_product($id){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        return $kq;
    }

    function update_product($id, $ten_sp, $images, $gia, $id_danh_muc) {
        $conn = connect_db();
        if($images == "") {
            $sql = "UPDATE tbl_product SET ten_sp = :ten_sp, gia = :gia, id_danh_muc = :id_danh_muc WHERE id = :id";
        } else {
            $sql = "UPDATE tbl_product SET ten_sp = :ten_sp, gia = :gia, id_danh_muc = :id_danh_muc, images = :images WHERE id = :id";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ten_sp', $ten_sp);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':id_danh_muc', $id_danh_muc);
        $stmt->bindParam(':id', $id);
        if($images != "") {
            $stmt->bindParam(':images', $images);
        }
        $stmt->execute();
    }

    function delete_product($id) {
        $conn = connect_db();
        $sql = "UPDATE tbl_product SET hien_thi_sp = 0 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Hàm để khôi phục sản phẩm đã ẩn
    function restore_product($id) {
        $conn = connect_db();
        $sql = "UPDATE tbl_product SET hien_thi_sp = 1 WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function get_hidden_products() {
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE hien_thi_sp = 0");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function count_san_pham() {
        $conn = connect_db();
        $stmt = $conn->query("SELECT COUNT(*) as total FROM san_pham");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    
?>