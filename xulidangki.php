<html>
    <body>
        <?php
         session_start();
            $name= $_POST['name'];
            $gt= $_POST['gt'];
            $sdt= $_POST['sdt'];
            $email = $_POST['email'];
            $address= $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $conn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại: " . $conn->connect_error);
            mysqli_query($conn, "SET NAMES 'utf8' ");

            $sql = "SELECT * FROM thongtinKH WHERE Username='$username' OR Email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)> 0) {
                header("Location: dangki.php?error=Tên đăng nhập hoặc email đã được sử dụng, vui lòng chọn tên khác hoặc sử dụng email khác.");
                exit();
            } else {
                $sql = "INSERT INTO thongtinKH (Name, Gioitinh, Sodienthoai, Email, Diachi, Username, Password) 
                        VALUES ('$name', '$gt', '$sdt','$email','$address','$username','$password')";
                if ($conn->query($sql) === TRUE) {
                    header("Location: trangchu.php?error=Đăng kí thành công.");
                }
            }
            
            mysqli_free_result($result);
            mysqli_close($conn);
        ?>
        
    </body>
<html>
