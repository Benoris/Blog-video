<?php

/**
 * Nom du fichier : deletevideo.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : supprime la vidéo
 */

$idVideo = -1;
$titre = '';
$soustitre = '';
$description = '';

require_once '../model/video.php';

$mdp = $_POST['mdp'];

if (filter_has_var(INPUT_POST, 'delete')) {
    $idVideo = filter_input(INPUT_POST, 'idVideo', FILTER_VALIDATE_INT);

    $video = getVideo($idVideo);
    if (is_array($video)) {
        $idVideo = $video['idVideo'];
        $checkpwd = checkPassword($idVideo, $mdp);

        if ($checkpwd == TRUE) {
            if (deleteVideo($idVideo)) {
                header("location:../index.php");
                exit;
            }
        } elseif($checkpwd == FALSE) {
            session_start();
            $_SESSION['error']= "Le mot de passe est invalide";
            header("location:../index.php");
            exit;
        }
    }
}
