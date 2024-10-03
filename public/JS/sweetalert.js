function showSuccessAlert(title, text) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: title,
        text: text,
        showConfirmButton: false,
        timer: 1500
    });
}

// public/JS/sweetalert.js

function confirmDelete(callback) {
    Swal.fire({
        title: "Are you sure?",
        text: "Please go to the hidden section if you change your mind !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            callback(); 
        }
    });
}

// Hàm xác nhận khôi phục
function confirmRestore(url) {
    Swal.fire({
        title: "Bạn có chắc muốn khôi phục mục này?",
        showCancelButton: true,
        confirmButtonText: "Khôi phục",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url; // Chuyển hướng đến URL khôi phục
        }
    });
}

// Xác nhận ẩn người dùng
function confirmHideUser(userId) {
    Swal.fire({
        title: "Bạn có chắc muốn ẩn người dùng này?",
        showCancelButton: true,
        confirmButtonText: "Ẩn",
        cancelButtonText: "Hủy"
    }).then((result) => {
        if (result.isConfirmed) {
            // Nếu xác nhận, chuyển hướng đến URL ẩn người dùng
            window.location.href = "index.php?act=hide_user&id=" + userId;
        }
    });
    
}