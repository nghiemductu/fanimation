<?php
    function get_new_arrivals($limit = 4) {
        $conn = connect_db();
        $sql = "SELECT * FROM products WHERE hien_thi_sp = 1 ORDER BY id DESC LIMIT :limit";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>