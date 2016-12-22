<?php

/*
 * Nom du fichier : video.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 */

require_once 'dbconnection.php';

/**
 * fonction qui retourne une liste avec les données sur les vidéos
 * @return type
 */
function getVideos() {
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video`');
    $query->execute(array());
    return $query->fetchAll();
}

function getVideo($idVideo) {
    $db = connectDb();
    $query = $db->prepare("SELECT * FROM video WHERE idVideo = ?");
    $query->execute(array($idVideo));
    $line = $query->fetch();
    return $line;
}

/**
 * 
 * @return type
 */
function getCategorie() {
    $query = connectDb()->prepare('SELECT NomCategorie, idCategorie FROM categorie ');
    $query->execute(array());
    return $query->fetchAll();
}

/**
 * 
 * @param type $idCategorie
 * @return type
 */
function filterVideo($idCategorie) {
    $bdd = connectDb();
    $sql = "SELECT * FROM video WHERE `idCategorie` =?";
    $query = $bdd->prepare($sql);
    $query->execute(array($idCategorie));
    return $query->fetch();
}

/**
 * fonction qui ajoute des données (vidéo)
 * @param type $title
 * @param type $soustitre
 * @param type $description
 * @param type $link
 * @param type $mdp
 * @param type $categorie
 * @return type
 */
function addVideo($title, $soustitre, $description, $link, $mdp, $categorie) {
    $db = connectDb();
    if ($mdp != "") {
        $sql = "INSERT INTO video(Titre,SousTitre,Description,Lien,MDP,idCategorie) " .
                " VALUES (?, ?, ?, ?, ?, ?)";
        $request = $db->prepare($sql);
        if ($request->execute(array($title, $soustitre, $description, $link, $mdp, $categorie))) {
            return $db->lastInsertID();
        } else {
            return NULL;
        }
    } else {
        $sql = "INSERT INTO video(Titre,SousTitre,Description,Lien,idCategorie) " .
                " VALUES (?, ?, ?, ?, ?)";
        $request = $db->prepare($sql);
        if ($request->execute(array($title, $soustitre, $description, $link, $categorie))) {
            return $db->lastInsertID();
        } else {
            return NULL;
        }
    }
}

/**
 * 
 * @param type $idVideo
 * @param type $title
 * @param type $soustitre
 * @param type $description
 * @param type $link
 * @param type $mdp
 * @param type $categorie
 * @return type
 */
function updateVideo($idVideo, $title, $soustitre, $description, $link, $mdp, $categorie) {
    if($mdp == ""){
        $mdp = null;
    }
    $db = connectDb();
    $sql = "UPDATE video SET "
            . "Description = :desc, "
            . "Titre = :titre, "
            . "SousTitre = :soustitre, "
            . "Lien = :link, "
            . "MDP = :mdp, "
            . "idCategorie = :cat "
            . "WHERE idVideo = :idVideo";

    $request = $db->prepare($sql);
    if ($request->execute(array(
                'desc' => $description,
                'titre' => $title,
                'soustitre' => $soustitre,
                'link' => $link,
                'mdp' => $mdp,
                'cat' => $categorie,
                'idVideo' => $idVideo))) {
        return $idVideo;
    } else {
        return NULL;
    }
}

/**
 * 
 * @param type $idVideo
 */
function deleteVideo($idVideo) {
    $db = connectDb();
    $query = $db->prepare("DELETE FROM video WHERE idVideo = ?");
    return ($query->execute(array($idVideo)));
}

/**
 * 
 * @param type $idVideo
 * @param type $mdp
 * @return boolean
 */
function checkPassword($idVideo, $mdp) {
    $db = connectDb();
    $sql = "SELECT MDP FROM video WHERE idVideo = ?";
    $query = $db->prepare($sql);
    $query->execute(array($idVideo));

    $result = $query->fetch();
    if ($result[0] == $mdp) {
        return true;
    } /* elseif ($result[0] == null) {
      return true;
      } */ else {
        return false;
    }
}
