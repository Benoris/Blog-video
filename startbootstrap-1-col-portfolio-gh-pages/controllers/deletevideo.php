<?php

$idVideo = -1;
$titre = '';
$soustitre = '';
$description = '';

require_once '../model/video.php';


if (filter_has_var(INPUT_POST, 'delete')) {
    $idVideo = filter_input(INPUT_POST, 'idVideo', FILTER_VALIDATE_INT);

    $video = getVideo($idVideo);
    if (is_array($video)) {
        $idVideo = $video['idVideo'];

        if (deleteVideo($idVideo)) {
            header("location:listvideo.php");
            exit;
        }        
    }
}
