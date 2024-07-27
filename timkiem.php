<?php
    session_start();
    $kn = mysqli_connect("localhost", "root", "", "csdl_webnhom") or die("Kết nối thất bại.");
    mysqli_query($kn, "SET NAMES 'utf8' ");

    if (isset($_POST['timkiem'])) {
        $keyword = $_POST['timkiem'];
        $query = "SELECT * FROM tbl_sanpham WHERE ten_sanpham LIKE '%$keyword%'";
        $result = mysqli_query($kn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="box">';
            echo '<form method="post" action="">';
            echo '<img width="300" height="200" src="data:image/jpeg;base64,' . base64_encode($row["img_sanpham"]) . '">';
            echo '<h2>' . $row['ten_sanpham'] . '</h2>';
            echo '<p>Giá: ' . $row['gia_sanpham'] . '</p>';
            echo '<input type="hidden" name="id" value="' . $row['id_sanpham'] . '">';
            echo '<input type="hidden" name="name" value="' . $row['ten_sanpham'] . '">';
            echo '<input type="hidden" name="price" value="' . $row['gia_sanpham'] . '">';
            echo '<p>Số lượng:<input type="number" name="quantity" value="' . $row['Soluong'] . '"></p>';
            echo '<br><input type="submit" name="add_to_cart[' . $row['id_sanpham'] . ']" class="btn" value="Thêm vào giỏ hàng">';
            echo '<br><input type="submit" name="buy_now" class="btn" value="Mua ngay">';
            echo '</form>';
            echo '</div>';
        }
    }
?>
