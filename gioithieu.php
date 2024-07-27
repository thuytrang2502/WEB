<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Giới thiệu - Tiệm Ăn YUKISU</title>
        <style>
            
            .hero {
                color: #000000;
                padding: 100px 20px;
                text-align: center;
            }

            .hero h1 {
                font-size: 50px;
                margin-bottom: 10px;
            }

            .features {
                width: 500px;
                height: 200px;
                color: #df0a03;
                padding: 20px 20px;
                margin-left: 100px;
            }
            .about-us{
                width: 800px;
                height: inherit;
                color: #0323d7;
                padding: 50px 20px;
                margin-left: 700px;
            }
            k{
                color: #000000;
            }
        </style>

    </head>
    <body>
        <?php
                session_start();
                include 'header.php';
				$con = mysqli_connect("localhost","root","","csdl_webnhom") or die("Không kết nối được");
				mysqli_query($con, "SET NAMES 'utf8' ");

				if ($con->connect_error) {
                    die("Kết nối thất bại: " . $con->connect_error);
                }
            
                $sql = "SELECT * FROM tbl_gioithieu";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<img width="100%" height="500" src="data:image/jpeg;base64,'.base64_encode($row["img_gioithieu"]).'">';
                        echo '<section class="features">';
                        echo '<h1>' . $row['vect_gioithieu'] . '</h1>';
                        echo '<br><k>' . $row['nd1_vect_gioithieu'] . '</k>';
                        echo '<br><br><k>' . $row['nd2_vect_gioithieu'] . '</k>';
                        echo'</section>';
                        echo '<section class="about-us">';
                        echo '<h1>' . $row['vesp_gioithieu'] . '</h1>';
                        echo '<br><k>' . $row['nd1_vesp_gioithieu'] . '</k>';
                        echo '<br><br><k>' . $row['nd2_vesp_gioithieu'] . '</k>';
                        echo'</section>';
                    }
                } else {
                    echo "Không có bài đăng nào";
                }
                $con->close();
        ?>
        <?php include 'footer.php'; ?>
</body>
</html>