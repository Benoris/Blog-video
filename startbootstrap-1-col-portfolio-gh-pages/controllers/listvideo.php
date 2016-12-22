<?php
/*
 * Nom du fichier : listvideo.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : Pour afficher dans view les vidéos et les catégorie
 */

require_once 'model/video.php';

$videos = getVideos();
$categories = getCategorie();

include 'view/showvideo.php';