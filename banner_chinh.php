<div id="banner-container" ">
    <?php
        $kn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");
        mysqli_query($kn, "SET NAMES 'utf8' ");
        $query = "SELECT * FROM tbl_trangchu WHERE ID_baiviet = 1";
        $result = mysqli_query($kn, $query);
        echo '<div id="video-container">';
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        echo '</div>'; 
    ?>
    <video id="banner-video" autoplay loop muted style="width:100%;margin-bottom:10px;">
        <source src="<?php echo 'data:video/mp4;base64,' . base64_encode($row['Tailieu']) ; ?>" type="video/mp4">
    </video>
    <?php
        } else {
            echo "Không tìm thấy video.";
        }
        mysqli_close($kn);
    ?>
</div>