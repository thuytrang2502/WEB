<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
	<title>Trang chủ - Tiệm Ăn YUKISU</title>
    <style>
        footer {
            background-color: #000000;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            margin-top: 100px;
        }
        footer h1 {
            color: #ff5900;  
        }
        footer i {
            color: #ff5900;
        }
        footer p {
            font-size: 1.5rem;
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <footer>
    <div class="Tieude">
        <?php
            $con = mysqli_connect("localhost","root","","csdl_webnhom") or die("Không kết nối được");
            mysqli_query($con, "SET NAMES 'utf8' ");

            if ($con->connect_error) {
                die("Kết nối thất bại: " . $con->connect_error);
            }
        
            $sql = "SELECT * FROM tbl_footer";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>

                    <div class = "footer-div-2">
                    <h1><?php echo $row['ten_footer'] ?></h1>
                        <p><i class = "fa fa-mobile"></i> Liên hệ: <?php echo $row['lienhe_footer'] ?> </p>
                        <p><i class = "fa fa-envelope"></i> Email:<a class="link" style="color: #F7941D;" href="mailto:yukisu@gmail.com.vn"> <?php echo $row['email_footer'] ?></a> </p>
                        <p><i class = "fa fa-map-marker"></i> Địa Chỉ: <?php echo $row['diachi_footer'] ?></p>
                    </div>
            <?php  }
            } else {
                echo "Không có bài đăng nào";
            }
            $con->close();
        ?>
        </div>
	</footer>
</body>
</html>