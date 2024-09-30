<?php
function check_username_exists($username) {
    $conn = connect_db();
    $sql = "SELECT COUNT(*) FROM user WHERE user_name = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function check_email_exists($email) {
    $conn = connect_db();
    $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

function register_user($username, $email, $password) {
    $conn = connect_db();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (user_name, email, password, role, hien_thi_user) VALUES (:username, :email, :password, 1, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    return $stmt->execute();
}

function get_user_by_username($username) {
    $conn = connect_db();
    $sql = "SELECT * FROM user WHERE user_name = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}