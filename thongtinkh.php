<html>
	<head>
		<meta charset="UTF-8">
		<title>Thông tin cá nhân</title>
		<style>
			.TBHT{
				
				height: auto;
				width: 800px;
				text-align: center;
				border-collapse:collapse;
				border-right-width: 4px;
				margin: auto;
            }
            .TBHT th, td{
                border: solid 1px grey;
            }
			.TBHT th{
                color:#00544f;
            }
            .TBHT caption {
                font-size:30px;
                margin-bottom: 10px;
            }
            
		</style>

	</head>
	<body>
        <?php
            session_start();
            $conn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Không thể kết nối.");
            mysqli_query($conn, "SET NAMES 'utf8' ");
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM thongtinkh WHERE Username = '$username'";

            $kq = mysqli_query($conn, $sql) or die("Không thực hiện được SQL");

            if(mysqli_num_rows($kq) > 0) {
                echo "<table class='TBHT'>";
                echo "<caption><b>THÔNG TIN </b></caption>";
                echo "<th>Tên khách hàng</th>";
                echo "<th>Giới tính</th>";
                echo "<th>Email</th>";
                echo "<th>Địa chỉ</th>";
                echo "<th>Số điện thoại</th>";
                echo '<td><a href="trangchu.php">Trang chủ</a></td>';
                echo "</tr>";

                while($row = mysqli_fetch_assoc($kq)) {
                    if($row['Gioitinh'] == 'Nam') {
                        $gioitinh = 'Nam';
                    } else {
                        $gioitinh = 'Nữ';
                    }
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $gioitinh . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Diachi'] . "</td>";
                    echo "<td>" . $row['Sodienthoai'] . "</td>";
                    echo '<td><a href="chinhsua.php">Chỉnh sửa</a></td>';
                    echo "</tr>";
                    
                }
            }
            
            mysqli_free_result($kq);
            mysqli_close($conn);
            
        ?>
        
    </body>
</html>
