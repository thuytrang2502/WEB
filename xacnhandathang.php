<html>
    <head>
        <meta charset="utf8">
        <title>Xác nhận đặt hàng</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f2f2f2;
            }

            .checkout-form {
                max-width: 400px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 4px;
                box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            }

            .checkout-form h2 {
                font-size: 24px;
                text-align: center;
                margin-bottom: 20px;
            }

            .checkout-form input[type="text"],
            .checkout-form input[type="tel"],
            .checkout-form input[type="radio"],
            {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

            .btn_xntt{
                display: flex;
                justify-content: center;
                align-items: center;
                
            }
            
            .xntt {
                background-color: #4caf50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px; 
                font-size: 16px; 
                cursor: pointer;
            }


            .checkout-form button:hover {
                background-color: #45a049;
            }
            table-cart {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .table-cart th, .table-cart td {
                padding: 10px;
                text-align: center;
                border-bottom: 1px solid #ddd;
            }

            .table-cart th {
                background-color: #f2f2f2;
            }

            .text-center {
                text-align: center;
            }

        </style>
    </head>
    <body>
        <?php
            session_start();
            include 'header.php';
            $kn = mysqli_connect("localhost", "root", "", "csdl_webnhom") or die("Kết nối thất bại.");
            mysqli_query($kn, "SET NAMES 'utf8' ");

            //check người dùng đã đăng nhập chưa?
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                $username = 'guest';
                header('Location: dangnhap.php');
            }

            // Lấy thông tin giỏ hàng
            $query = "SELECT tbl_giohang.*, tbl_sanpham.* FROM tbl_giohang JOIN tbl_sanpham ON tbl_giohang.product_id = tbl_sanpham.id_sanpham WHERE tbl_giohang.username = '$username'";
            $result = mysqli_query($kn, $query);
            echo '<div class="checkout-form">
            <br><h2 class="text-center">XÁC NHẬN ĐẶT HÀNG</h2>';
            $tong = 0;
            if (mysqli_num_rows($result) > 0) {

                echo '<table class="table-cart">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'. $row['ten_sanpham'].'</td>';
                    echo '<td>'.$row['gia_sanpham'].'</td>';
                    echo '<td>'.$row['quantity'].'</td>';
                    echo '<td>'.number_format($row['gia_sanpham'] * $row['quantity']).'</td>';
                    echo '</tr>';
                    $tong += $row['gia_sanpham'] * $row['quantity'];

                    $insert_chitietdonhang= "INSERT INTO tbl_chitietdonhang (id_donhang, id_sanpham, quantity, gia_sanpham) 
                                            VALUES (LAST_INSERT_ID(), '".$row['id_sanpham']."', '".$row['quantity']."', '".$row['gia_sanpham']."')";
                    mysqli_query($kn, $insert_chitietdonhang);
                }
                echo '<tr>
                        <td></td><td></td><td><b>Tổng tiền:</b></td>'; 
                echo '<td>'.number_format($tong).'</td>';
                echo '</tr>';
                echo '</table>';

                echo '<form method="post" action="xacnhandathang.php">
                        <label for="nguoi_nhan">Người nhận hàng:</label>
                        <input type="text" id="nguoi_nhan" name="nguoi_nhan" required><br><br>
                        <label for="sdt">Số điện thoại      :</label>
                        <input type="tel" id="sdt" name="sdt" required><br><br>
                        <label for="dia_chi">Địa chỉ nhận hàng:</label>
                        <input type="text" id="dia_chi" name="dia_chi" required><br><br>
                        <label for="pttt">Phương thức thanh toán:</label>
                        <select id="pttt" name="pttt">
                            <option value="Thanh toán bằng thẻ ghi nợ/ tài khoản">Thanh toán bằng thẻ ghi nợ/ tài khoản</option>
                            <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        </select>
                        <div class="btn_xntt">
                            <button type="submit" class="xntt" name="xndathang">Xác nhận đặt hàng</button>
                        </div>
                    </form>
                </div>';
                //check nút xn đặt hàng 
                if (isset($_POST['xndathang'])) {
                    $nguoi_nhan = $_POST['nguoi_nhan'];
                    $sdt = $_POST['sdt'];
                    $dia_chi = $_POST['dia_chi'];
                    $pttt = $_POST['pttt'];

                    $insert_donhang = "INSERT INTO tbl_donhang (username, tongtien, nguoi_nhan, sodienthoai, dia_chi, ptthanhtoan) 
                                           VALUES ('$username','$tong', '$nguoi_nhan', '$sdt', '$dia_chi', '$pttt')";
                    mysqli_query($kn, $insert_donhang);

                    $delete_query = "DELETE FROM tbl_giohang WHERE username = '$username'";
                    mysqli_query($kn, $delete_query);

                    echo '<script>alert("Đặt hàng thành công.");</script>';
                }
                
            } else {
                echo "Giỏ hàng trống.";
            }
            mysqli_close($kn);
        ?>
    </body>
</html>
