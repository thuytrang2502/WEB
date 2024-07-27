<html>
    <head>
        <title>Trang chủ - ĂN VẶT YUKISU</title>
        <meta charset="utf-8">
        <style>

        </style>
    </head>
    <body>
    <div id="video-container" >
        <video id="video-player" autoplay loop muted style="width:100%;">
        </video>
    </div>
        <script>
            var videoSources = [
                <?php
                $kn = mysqli_connect("localhost","root","","csdl_webnhom") or die("Kết nối thất bại.");
                mysqli_query($kn, "SET NAMES 'utf8' ");
                $query = "SELECT * FROM tbl_video";
                $result = mysqli_query($kn, $query);
                $videoSources = array();
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    $video_data = $row["video"];
                    $video_src = "data:video/mp4;base64,".base64_encode($video_data);
                    array_push($videoSources, "'".$video_src."'");
                    }
                }
                echo implode(",", $videoSources);
                mysqli_close($kn);
                ?>
            ];
            
            var currentSourceIndex = 0;
            var videoPlayer = document.getElementById("video-player");

            function playNextVideo() {
                currentSourceIndex = (currentSourceIndex + 1) % videoSources.length;
                videoPlayer.src = videoSources[currentSourceIndex];
                videoPlayer.load();
                videoPlayer.play();
            }
            playNextVideo();
            setInterval(playNextVideo, 2000);
        </script>

    </body>
</html>