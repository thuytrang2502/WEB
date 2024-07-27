<html>
    <head>
        <title>Đổi mật khẩu</title>
        <meta charset="utf-8">
        <style>
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

			.login form input[type="text"], .login form input[type="password"] {
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
			

        </style>
    </head>
    <body>
        <div class="login">
			<form action="xuli_doipass.php" method= "POST" id="signup-form">
                <label for="username">Tên đăng nhập</label>
                <input type="text" name="username" id="username" required >

                <label for="password">Mật khẩu hiện tại</label>
                <input type="password" name="password" id="password"required>
                
                <label for="newpassword">Mật khẩu mới</label>
                <input type="password" name="newpassword" id="newpassword"required>

                <label for="confirmpassword">Nhập lại mật khẩu mới</label>
                <input type="password" name="confirmpassword" id="confirmpassword"required>

                <input type="submit" value="Đổi mật khẩu">
            </form>
		</div>    
    </body>
</html>
