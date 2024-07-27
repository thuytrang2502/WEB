<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
	<title>Trang chủ - Bán đồ ăn vặt</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .Tieude{
            width: 80%;
            margin: 0 auto;
            overflow: hidden;
        }
        .Tieude a:hover {
            color: cyan;
        }
        header {
            background-color:#00544f;
            color: #ffffff;
            padding: 10px;
        }

        header h1 {
            float: left;
            font-size: 50px;
        }

        nav ul {
            margin-right: auto;
            list-style: none;
            

        }
        nav li {
            display: inline-block;
            margin-left: 40px;
            font-size: 20px;
        }
        nav ul1{
            text-align: center;
            list-style: none;
            margin-left: 80px;
        }
        nav a {
            color:#ffffff ;
            text-decoration: none;
        }
        #user-menu  li a {
            display: block;
			text-decoration: none;
			background-color: #fff;
			border: none;
			border: solid 1px black;
			color: #00544f;
			font-size: 20px;
			padding: 5px 20px 5px 20px;
			border-radius: 20px;
			margin: auto;
			cursor: pointer;
            }
            #account-options ul li {
                display: none;

                
            }
            #user-menu a:hover {
                background-color: cyan;
            }
            #account-options {
                display: none;
                position: absolute;
                top: 50px;
                right: 0;
                padding: 10px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.2);
                z-index: 999;
            }
            
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <form align="right">
                    <div id="user-menu">
                        <?php
                            $kn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");
                            $isLoggedIn = isset($_SESSION['username']);
                            $isLoggedIn_admin = isset($_SESSION['admin_username']);
                        ?>                  
                        <div id="account-menu">
                            <?php if ($isLoggedIn || $isLoggedIn_admin ): 
                                if($isLoggedIn):
                                    $name = $_SESSION['username'];?>
                                    <li><a href="#" id="account-name"><?php echo $name; ?></a></li>
                                    <ul id="account-options">
                                        <li>
                                            <a href="thongtinkh.php">Thông tin<br></a>
                                            <a href="doipass.php">Đổi mật khẩu<br></a>
                                            <a href="dangxuat.php">Đăng xuất</a>
                                        <li>
                                    </ul>
                                    <?php endif; 
                                if($isLoggedIn_admin): 
                                    $name = $_SESSION['admin_username'];?>
                                    <li><a href="#" id="account-name"><?php echo $name; ?></a></li>
                                    <ul id="account-options">
                                    <li>
                                        <a href="thongtinkh.php">Quản lí sản phẩm<br></a>
                                        <a href="doipass.php">Đổi mật khẩu<br></a>
                                        <a href="dangxuat.php">Đăng xuất</a>
                                    <li>
                                    </ul>
                                <?php endif; ?>
                            <?php else:
                                $name = "guest"; ?>
                                <li><a href="#" id="account-name"><?php echo $name; ?></a></li>
                                <ul id="account-options">
                                <li>
                                    <a href="dangnhap.php">Đăng nhập</a>
                                    <a href="dangki.php">Đăng kí</a>
                                <li>
                                </ul>
                            <?php endif; ?>
                            
                            
                        </div>
                        <script>
                            var accountMenu = document.getElementById('account-menu');
                            var accountName = document.getElementById('account-name');
                            var accountOptions = document.getElementById('account-options');

                            accountName.addEventListener('click', function(e) {
                                e.preventDefault();
                                if (accountOptions.style.display === 'none') {
                                    accountOptions.style.display = 'block';
                                } else {
                                    accountOptions.style.display = 'none';
                                }
                            });
                            document.addEventListener('click', function(e) {
                                if (e.target !== accountName && e.target.parentNode !== accountOptions) {
                                    accountOptions.style.display = 'none';
                                }
                            });
                        </script>
    
                    </div>        
                </form>
            </ul>
        </nav>
        <div class="Tieude">
            <h1>YUKISU</h1>
            <h2><br>Xin Chào Qúy Khách !</h2><br><br>
            <?php include 'thanhtimkiem.php'; ?>
            <nav>
                <ul1><form align="center">
                    <li><br><a href="trangchu.php">&#x1F3E0;TRANG CHỦ</a></li>
                    <li><br><a href="menu.php">&#x2637;MENU</a></li>
                    <li><br><a href="gioithieu.php">&#x1F310;GIỚI THIỆU</a></li>
                    <li><br><a href="danhgia.php">&#x1F31F;ĐÁNH GIÁ</a></li>
                    <?php
                        $query = "SELECT tbl_giohang.*, tbl_sanpham.* 
                                FROM tbl_giohang JOIN tbl_sanpham ON tbl_giohang.product_id = tbl_sanpham.id_sanpham 
                                WHERE tbl_giohang.username = '$name'";
                        $result = mysqli_query($kn, $query);
                        $slsp = mysqli_num_rows($result);    
                        echo '<li><br><a href="giohang.php">&#x1F6D2;GIỎ HÀNG(' . $slsp . ')</a></li>';
                    ?>
                    </form>
                </ul1>
            </nav>
        </div>
    </header>
</body>
</html>