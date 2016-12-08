<?php

$idVideo = -1;
$titre = '';
$soustitre = '';
$description = '';

require_once 'model/video.php';

$video = getVideo($idVideo);
if(is_array($video)){
    $idVideo = $video['idVideo'];
    
    if(deleteVideo($idVideo)){
        header("location:listvideo.php");
        exit;
    }
}

