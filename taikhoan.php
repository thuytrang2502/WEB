<html>
    <head>
        <style>
            .account {
                position: relative;
            }

            #accountButton {
                font-size: 16px;
                padding: 10px;
                background-color: #f0f0f0;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

                #accountMenu {
                display: none;
                position: absolute;
                top: 40px;
                right: 0;
                width: 200px;
                padding: 10px;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                }

        </style>
    </head>
    <body>
        <div class="account">
            <button id="accountButton">Tài khoản</button>
            <div id="accountMenu">
                <li><a href="#">Cài đặt</a></li>
                <li><a href="#">Chỉnh sửa</a></li>
                <li><a href="#">Đăng xuất</a></li>
            </div>
        </div>  
        <script>
            const accountButton = document.getElementById('accountButton');
            const accountMenu = document.getElementById('accountMenu');

            accountButton.addEventListener('click', function() {
            accountMenu.style.display = accountMenu.style.display === 'block' ? 'none' : 'block';
            });

        </script>
    </body>
</html>