<?php


require_once '../model/video.php';

$videos = getVideo();

include'../view/showvideo.php';