<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost", "root", "", "csdl_webnhom") or die("Kết nối không thành công.");

    $sql1 = "SELECT * FROM thongtinKH WHERE Username='$username' AND Password='$password'";
    $sql2 = "SELECT * FROM tbl_admin WHERE Username_admin='$username' AND Password='$password'";

    $result1 = mysqli_query($conn, $sql1);
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result1) > 0 || mysqli_num_rows($result2) > 0) {
        if (mysqli_num_rows($result1) > 0) {
            // Đăng nhập thành công với tài khoản người dùng
            $_SESSION['username'] = $username;
            header("Location: trangchu.php");
        } else {
            if (mysqli_num_rows($result2) > 0) {
                // Đăng nhập thành công với tài khoản admin
                $_SESSION['admin_username'] = $username;
                header("Location: menu.php");
            }
        }
    } else {
        // Sai tên đăng nhập hoặc mật khẩu
        header("Location: dangnhap.php?error=Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.");
    }

    mysqli_close($conn);
?>
