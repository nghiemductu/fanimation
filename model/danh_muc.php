<?php
function getall_dm() {
    $conn = connect_db();
    $sql = "SELECT * FROM category WHERE hien_thi_dm = 1 ORDER BY parent_id, id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}


function add_category($ten_danh_muc, $parent_id) {
    $conn = connect_db();
    $sql = "INSERT INTO category (ten_danh_muc, parent_id) VALUES (:ten_danh_muc, :parent_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
    $stmt->bindParam(':parent_id', $parent_id);
    $stmt->execute();
}

function update_category($id, $ten_danh_muc, $parent_id) {
    $conn = connect_db();
    $sql = "UPDATE category SET ten_danh_muc = :ten_danh_muc, parent_id = :parent_id WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
    $stmt->bindParam(':parent_id', $parent_id);
    $stmt->execute();
}

function delete_category($id) {
    $conn = connect_db();
    $sql = "UPDATE category SET hien_thi_dm = 0 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function get_category($id) {
    $conn = connect_db();
    $sql = "SELECT * FROM category WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function restore_category($id) {
    $conn = connect_db();
    $sql = "UPDATE category SET hien_thi_dm = 1 WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Thêm hàm mới để lấy danh sách các danh mục đã ẩn
function get_hidden_categories() {
    $conn = connect_db();
    $sql = "SELECT * FROM category WHERE hien_thi_dm = 0 ORDER BY parent_id, id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function count_danh_muc() {
    $conn = connect_db();
    $sql = "SELECT COUNT(*) as total FROM danh_muc";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}



?>