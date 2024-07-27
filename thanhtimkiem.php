<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        .thanhtimkiem {
            text-align: center;
            margin: 20px 0;
        }

        .timkieminput {
            width: 300px;
            padding: 10px 15px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .btn_tk {
            display: inline-block;
        }

        .timkiem-submit {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 0 5px 5px 0;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .timkiem-submit:hover {
            background-color: #45a049;
            color: #fff;
        }
    </style>
</head>
<body>
    <form action="timkiem.php" method="post">
        <div class="thanhtimkiem">
            <input class="timkieminput" type="text" name="timkiem" placeholder="Tìm kiếm món...">
            <div class="btn_tk">
                <button class="timkiem-submit" type="submit">Tìm</button>
            </div>
        </div>
    </form>
</body>
</html>