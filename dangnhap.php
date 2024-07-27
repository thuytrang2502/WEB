
<!DOCTYPE>
<html>
<head>
	<title>Đăng kí - Tasty Kitchen - Đặt đồ ăn online</title>
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

		.signin {
			width: 500px;
			background: #f1f1f1;
			margin: 100px auto;
			padding: 20px 30px;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(248, 247, 247, 0.3);
		}

		.signin h1 {
			text-align: center;
			margin-bottom: 30px;
		}

		.signin form {
			display: flex;
			flex-direction: column;
		}

		.signin form label {
			font-size: 18px;
			color: #555;
			margin-bottom: 10px;
			display: flex;
			align-items: center;
		}

		.signin form input[type="text"], .signin form input[type="password"], .signin form input[type="email"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: none;
			background: #f9f9f9;
		}


		.signin form input[type="submit"] {
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
		.signin form a {
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
			.signin form p {
				color: #00544f;
				text-align: center;
			}
	</style>
</head>
<body>
	<div class="signin">
		<h1>Đăng nhập</h1>
		<form action="xulidangnhap.php"  method="post">
			<label for="username">Tên đăng nhập</label>
			<input type="text" name="username" id="username" required >

			<label for="password">Mật khẩu</label>
			<input type="password" name="password" id="password"required> 

			<br><input type="submit" value="Đăng nhập">

			<br><p>Bạn chưa có tài khoản?</p><a href="dangki.php">Đăng kí</a>
                        
		</form>
	</div>
</body>
</html>


