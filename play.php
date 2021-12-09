<?php

$fichier = file("fichier.txt");
 
$total = count($fichier);

for($i = 0; $i < $total; $i++) 
{
$toplay = $fichier[$i];
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../play.css">
    <title>Player</title>
</head>
<body>
    <section>
        <div class="container">
            <div id="video_player">
                <video src="../videos/<?php echo $toplay; ?>" id="main-video"></video>
                <div class="progressAreaTime">0:00</div>
                <div class="controls">
                    <div class="progress-area">
                        <div class="progress-bar">
                            <span></span>
                        </div>
                    </div>
                    <div class="controls-list">
                        <div class="controls-left">
                            <span class="icon">
                                <i class="material-icons fast-rewind">replay_10</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons play_pause">play_arrow</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons fast-forward">forward_10</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons volume">volume_up</i>
                                <input type="range" min="0" max="100" class="volume_range">
                            </span>
                            <div class="timer">
                                <span class="current">0:00</span> / <span class="duration">0:00</span>
                            </div>
                        </div>
                        <div class="controls-right">
                            <span class="icon">
                                <i class="material-icons auto-play"></i>
                            </span>
                            <span class="icon">
                                <i class="material-icons settingsBtn">settings</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons picture_in_picutre">picture_in_picture_alt</i>
                            </span>
                            <span class="icon">
                                <i class="material-icons fullscreen">fullscreen</i>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="settings">
                    <div class="playback">
                        <span>Playback Speed</span>
                        <ul>
                            <li data-speed="0.25">0.25</li>
                            <li data-speed="0.5">0.5</li>
                            <li data-speed="0.75">0.75</li>
                            <li data-speed="1"  class="active">Normal</li>
                            <li data-speed="1.25">1.25</li>
                            <li data-speed="1.5">1.5</li>
                            <li data-speed="1.75">1.75</li>
                            <li data-speed="2">2</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <script src="../play.js"></script>
</body>
</html>