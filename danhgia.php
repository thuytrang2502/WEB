<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đánh giá - Tiệm Ăn YUKISU</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .stars {
            width: 270px;
            display: inline-block;
        }
        input.star {
            display: none;
        }
        label.star {
            float: right;
            padding: 10px;
            font-size: 36px;
            color: #444;
            transition: all .2s;
        }
        input.star:checked ~ label.star:before {
            content: '\f005';
            color: #FD4;
            transition: all .25s;
        }
        input.star-5:checked ~ label.star:before {
            color: #FE7;
            text-shadow: 0 0 20px #952;
        }
        input.star-1:checked ~ label.star:before {
            color: #F62;
        }
        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }
        label.star:before {
            content: '\f006';
            font-family: FontAwesome;
        }
        h1 {
            font-size: 36px;
            text-align: center;
        }
        p {
            font-size: 18px;
            text-align: center;
        }
        .alert {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        session_start();
        include 'header.php';
    ?>
    <main>
        <br><h1>Gửi Ý Kiến Đánh Giá Cho Chúng Tôi</h1><br>
        <?php
            if(isset($_SESSION['error'])) {
                echo "<h2 class='alert'>".$_SESSION['error']."</h2>";
                unset($_SESSION['error']);
            }
        ?>
        <form class="checkout-form" method="POST">
            <label for="tenkh">Họ và tên:</label>
            <input type="text" name="tenkh" required><br>

            <label for="sdt">Số điện thoại:</label>
            <input type="text" name="sdt" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="noidung">Nội Dung Đánh Giá:</label>
            <input type="text" name="noidung" required><br>

            <div class="stars">
                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div><br>
            <input type="submit" name="dg" value="Gửi">
        </form>
        <div id="dg-msg" style="display: none;">Đã gửi ý kiến đánh giá thành công.</div>
    </main>
    <?php
        if(isset($_POST['dg'])) {
            $tenkh = $_POST['tenkh'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $noidung = $_POST['noidung'];
            $star = $_POST['star'];

            $con = mysqli_connect("localhost","root","","csdl_webnhom") or die("Không kết nối được");
            mysqli_query($con, "SET NAMES 'utf8' ");

            $sql = "INSERT INTO tbl_danhgiakh(tenkh, sdt, email, noidung, saodg)
                    VALUES ('$tenkh', '$sdt', '$email', '$noidung', '$star')";
            $kq = mysqli_query($con, $sql) or die("Không thực hiện được SQL");

            if($kq) {
                echo '<script>alert("Đã gửi ý kiến đánh giá thành công.");</script>';
            } else {
                echo "<p>Gửi ý kiến đánh giá thất bại</p>";
            }

            mysqli_close($con);
        }
    ?>
    <?php include 'footer.php';?>
</body>
</html>
