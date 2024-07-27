<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");

    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if ($newpassword != $confirmpassword) {
        echo "New password and confirm new password are not the same.";
        exit();
    }

    $sql = "SELECT * FROM thongtinkh WHERE UserName='$username' AND PassWord='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
        exit();
    }

    $sql = "UPDATE thongtinkh SET PassWord='$newpassword' WHERE UserName='$username'";
    if (mysqli_query($conn, $sql)) {
        echo "Đổi mật khẩu thành công.";
        echo '<td><a href="trangchu.php">Trở về Trang chủ</a></td>';

    } else {
        echo "Đổi mật khẩu thất bại.";
    }

    mysqli_close($conn);
?>