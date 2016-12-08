<?php
/*
 * Nom du fichier : listvideo.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 */

require_once 'model/video.php';

$videos = getVideos();
$categories = getCategorie();

include 'view/showvideo.php';
include 'view/addform.php';