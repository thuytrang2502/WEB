
<div class="sidebar">
    <form method="POST" action="danhmuc.php">
        <div class="title-menu">
            <img src="logo/logo1.jpg">
            <span><h1>Yukisu-Food</h1></span>
        </div>
        <?php
        $kn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");
        mysqli_query($kn, "SET NAMES 'utf8' ");
        $sql = "SELECT * FROM tbl_danhmuc";
        $result = mysqli_query($kn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<input class="danhmuc" name="danhmuc" type="submit" value="' . $row['Ten_danhmuc'] . '">';
        }
        
        mysqli_close($kn);
        ?>

        <style>
            .sidebar {
                width: 200px;
                background-color: #f2f2f2;
                padding: 10px;
            }

            .title-menu {
                margin-bottom: 10px;
            }

            .title-menu h1 {
                font-size: 18px;
                color: #333;
            }

            .danhmuc {
                display: block;
                width: 100%;
                background-color: #ccc;
                color: #fff;
                padding: 15px;
                margin-bottom: 15px;
                border: none;
                cursor: pointer;


            }

            .danhmuc:hover {
                background-color: #555;
            }
        </style>
    </form>
</div>
