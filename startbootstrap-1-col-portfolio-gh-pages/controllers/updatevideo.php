<?php

/**
 * Nom du fichier : updatevideo.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : permet d'afficher dans la view, la vidéo qui vas être modifiée
 */

$idVideo = filter_input(INPUT_POST, 'idVideo', FILTER_VALIDATE_INT);

require_once 'model/video.php';

$video = getVideo($idVideo);
$categories = getCategorie();

include 'view/updateform.php';