<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Đăng kí - Tiệm Ăn YUKISU</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				font-family: 'Poppins', sans-serif;
				background: #faf8f7;
			}

			.login {
				width: 500px;
				background: #f1f1f1;
				margin: 100px auto;
				padding: 20px 30px;
				border-radius: 5px;
				box-shadow: 0px 0px 5px 0px rgba(248, 247, 247, 0.3);
			}

			.login h1 {
				text-align: center;
				margin-bottom: 30px;
			}

			.login form {
				display: flex;
				flex-direction: column;
			}

			.login form label {
				font-size: 18px;
				color: #555;
				margin-bottom: 10px;
				display: flex;
				align-items: center;
			}

			.login form input[type="text"], .login form input[type="password"], .login form input[type="email"] {
				padding: 10px;
				margin-bottom: 20px;
				border-radius: 5px;
				border: none;
				background: #f9f9f9;
			}


			.login form input[type="submit"] {
				background: #00544f;
				color: #fff;
				border: none;
				border-radius: 5px;
				padding: 10px;
				font-size: 18px;
				cursor: pointer;
			}
			.forget {
				color: #00544f;
				margin: auto;
			}
			.login form a {
				display: block;
				text-decoration: none;
				background-color: #fff;
				border: none;
				border: solid 1px #00544f;
				color: #00544f;
				font-size: 14px;
				padding: 5px 20px 5px 20px;
				border-radius: 20px;
				margin: auto;
				cursor: pointer;
				}
			.login form p {
				color: #00544f;
				text-align: center;
			}
		</style>
	</head>
	<body>
	<?php
		if(isset($_GET['error'])) {
			echo "<p style=' color:red;text-align: center; margin-top:20px'>".$_GET['error']."</p>";
		}
	?>
		<div class="login">
			<form action="xulidangki.php" method= "POST" id="signup-form">
				<h1>Đăng kí</h1>
				<label for="name">Họ tên:</label>
				<input type="text" id="name" name="name" required>

				<label for="sdt">Số điện thoại:</label>
				<input type="text" id="sdt" name="sdt" required>

				<label for="gt">Giới tính:</label>
				<input type="radio" name="gt" value="Nữ">Nữ
				<input type="radio" name="gt" value="Nam">Nam<br>

				<br><label for="email">Email:</label>
				<input type="email" id="email" name="email" required>

				<label for="address">Địa chỉ:</label>
				<input type="text" id="address" name="address" required>
				
				<label for="username">Tên đăng nhập:</label>
				<input type="text" id="username" name="username" required>
				
				<label for="password">Mật khẩu:</label>
				<input type="password" id="password" name="password" required>

				<input type="submit" value= "Đăng kí">
				<br><p>Bạn đã có tài khoản?</p><a href ="dangnhap.php">Đăng nhập</a>
			</form>
		</div>
	</body>
</html>
