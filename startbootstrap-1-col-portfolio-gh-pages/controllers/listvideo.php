<?php
/*
 * Nom du fichier : listvideo.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 */

require_once '../model/video.php';

$videos = getVideo();

include '../view/showvideo.php';