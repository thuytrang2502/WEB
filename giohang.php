<html>
    <head>
        <meta charset="utf8">
        <title>Đặt hàng</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                background-color: #f2f2f2;
            }

            .table-cart {
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

            .clear, .clearall, .dathang {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4caf50;
                color: #fff;
                text-decoration: none;
                border-radius: 4px;
                transition: background-color 0.3s;
            }

            .clear:hover, .clearall:hover, .dathang:hover {
                background-color: #45a049;
            }

            .clearall {
                background-color: #f44336;
                margin-left: auto;
            }
            main {
                max-width: 800px;
                margin: 20px auto;
                padding: 0 20px;
            }
            h1 {
                font-size: 36px;
                text-align: center;
            }
            p {
                font-size: 18px;
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

            //check ngdung đã login ?
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                $username = 'guest';
            }

            //thêm sp vào giỏ hàng
            
            //xóa sp khỏi giỏ hàng
            if (isset($_GET['clear'])) {
                $product_id = $_GET['product_id'];

                $query = "DELETE FROM tbl_giohang WHERE username = '$username' AND product_id = '$product_id'";
                mysqli_query($kn, $query);
                
                echo '<script>alert("Đã xóa sản phẩm khỏi giỏ hàng.");</script>';
            }
            //xóa all sp trg giỏ hàng
            if (isset($_GET['clearall'])) {
                $query = "DELETE FROM tbl_giohang WHERE username = '$username'";
                mysqli_query($kn, $query);
                
                echo '<script>alert("Đã xóa tất cả sản phẩm khỏi giỏ hàng.");</script>';
            }
            // Hiển thị giỏ hàng
            $query = "SELECT tbl_giohang.*, tbl_sanpham.* FROM tbl_giohang JOIN tbl_sanpham ON tbl_giohang.product_id = tbl_sanpham.id_sanpham WHERE tbl_giohang.username = '$username'";
            $result = mysqli_query($kn, $query);
            
            echo '<br><h2 class="text-center">GIỎ HÀNG</h2>';
            $tong = 0;
            if (mysqli_num_rows($result) > 0) {
                echo ' <form method="post" action="xacnhandathang.php">
                <table class="table-cart">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>'. $row['ten_sanpham'].'</td>';
                    echo '<td>'.$row['gia_sanpham'].'</td>';
                    echo '<td>'.$row['quantity'].'</td>';
                    echo '<td>'.number_format($row['gia_sanpham'] * $row['quantity']).'</td>';
                    echo '<td><a href="?clear&product_id=' . $row['product_id'] . '" class="clear">Xóa</a></td>';
                    echo '</tr>';
                    $tong += $row['gia_sanpham'] * $row['quantity'];
                }
                echo '<tr>
                        <td></td><td></td><td><b>Tổng tiền:</b></td>'; 
                echo '<td>'.number_format($tong).'</td>';
                echo '<td><a href="?clearall" class="clearall">Xóa tất cả</a><td>';
                echo '</tr>';
                echo '</table>';
                echo '<div class="text-center"><button type="submit" name="dathang" class="dathang">Đặt hàng</button></div>
            </form>';
            } else {
                echo "Giỏ hàng trống.";
            }
            
            mysqli_close($kn);
            include 'footer.php';
        ?>
    </body>
</html>
