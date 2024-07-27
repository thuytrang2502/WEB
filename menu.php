<html>
    <head>
        <meta charset="UTF-8">
        <title>Menu - Tiệm Ăn YUKISU</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        session_start();
        include 'header.php'; 
        include 'minimenu.php';
            $kn = mysqli_connect("localhost", "root", "", "csdl_webnhom") or die("Kết nối thất bại.");
            mysqli_query($kn, "SET NAMES 'utf8' ");

            $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
            $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
            $offset = ($current_page - 1) * $item_per_page;
            $products = mysqli_query($kn, "SELECT * FROM `tbl_sanpham` ORDER BY `id_sanpham` ASC  LIMIT " . $item_per_page . " OFFSET " . $offset);
            $totalRecords = mysqli_query($kn, "SELECT * FROM `tbl_sanpham`");
            $totalRecords = $totalRecords->num_rows;
            $totalPages = ceil($totalRecords / $item_per_page);


            if (mysqli_num_rows($products) == 0) {
                echo '<p>Không có sản phẩm nào được tìm thấy.</p>';
            } else {
                while ($row = mysqli_fetch_assoc($products)) {
                    echo '<div class="box">';
                    echo '<form method="post" action="">';
                    echo '<img width="300" height="200" src="data:image/jpeg;base64,'.base64_encode($row["img_sanpham"]).'">';
                    echo '<br><br><h2>' . $row['ten_sanpham'] . '</h2>';
                    echo '<br><c>Giá: ' . $row['gia_sanpham'] . '</c>';
                    echo '<input type="hidden" name="id" value="'. $row['id_sanpham'].'">';
                    echo '<input type="hidden" name="name" value="'. $row['ten_sanpham'].'">';
                    echo '<input type="hidden" name="price" value="'.$row['gia_sanpham'].'">';
                    echo '<p>Số lượng:<input type="number" name="quantity" value="'.$row['Soluong'].'"></p>';
                    echo '<br><input type="submit" name="add_to_cart['.$row['id_sanpham'].']" class="btn" value="Thêm vào giỏ hàng">';
                    echo '<br><br><input type="submit" name="buy_now['.$row['id_sanpham'].']" class="btn" value="Mua ngay">';
                    echo '</form>';
                    echo '</div>';       
                }
             }
             if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                $username = 'guest';
            }

            //thêm sp vào giỏ hàng
            if (isset($_POST['add_to_cart'])) {
                $product_id = $_POST['id'];
                $quantity = $_POST['quantity'];
                
                // check sp có trong giỏ hàng ?
                $query = "SELECT * FROM tbl_giohang WHERE username = '$username' AND product_id = '$product_id'";
                $result = mysqli_query($kn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Nếu sp đã có, cập nhật sl
                    $row = mysqli_fetch_assoc($result);
                    $new_quantity = $row['quantity'] + $quantity;

                    $update_query = "UPDATE tbl_giohang SET quantity = '$new_quantity' WHERE username = '$username' AND product_id = '$product_id'";
                    mysqli_query($kn, $update_query);
                    echo '<script>alert("Đã cập nhật số lượng sản phẩm.");</script>';
                } else {
                    $insert_query = "INSERT INTO tbl_giohang (username, product_id, quantity) VALUES ('$username', '$product_id', '$quantity')";
                    mysqli_query($kn, $insert_query);
                    echo '<script>alert("Đã thêm sản phẩm vào giỏ hàng.");</script>';
                }
            }
             
            mysqli_close($kn);
            include 'pagination.php';
            include 'footer.php';
        ?>
    </body>
</html>


