<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
	<title>Trang chủ - Tiệm Ăn YUKISU</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php 
        session_start();
        include 'sidebar.php'; ?>
    <div class="content">
        <?php include 'header.php'; ?>
        <section class="banner" style="margin-bottom:50px;">
        <?php include 'banner_chinh.php'; ?>
        </section>
        <div class="Tieude">
            <div class="l1">
                <br><h1 style="text-align: center">Món ngon siêu hấp dẫn<h1><br>
            </div>
                <div>
                    <?php include 'video.php'; ?>
                </div>
            </div >
        </section>
        <?php
            $kn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");
            mysqli_query($kn, "SET NAMES 'utf8' ");
            $query = "SELECT * FROM tbl_trangchu WHERE ID_baiviet != 1";
            $result = mysqli_query($kn, $query);

            if (mysqli_num_rows($result) == 0) {
                echo '<p>Không có bài viết nào được tìm thấy.</p>';
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class ="Tieude">';
                        echo '<div class="l1">';
                            echo '<h1 style="text-align: center"><br>' . $row['Ten_baiviet'] . '</h1><br>';
                        echo'</div>';
                        echo '<div class="box">';
                            echo '<h2>' . $row['Noidung'] . '</h2>';
                            echo '<img width="100%" height="100%" src="data:image/jpeg;base64,'.base64_encode($row["Tailieu"]).'">';
                        echo '</div>';
                    echo'</div>';
                }    
            }
            mysqli_close($kn);
        ?>
    </div>   
    <?php include 'footer.php'; ?>
</body>
</html>