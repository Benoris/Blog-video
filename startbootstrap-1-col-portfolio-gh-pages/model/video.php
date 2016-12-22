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
    $db = connectDb();
    $sql = "UPDATE video
SET Description=?, Titre=?, SousTitre =?, Lien = ?, MDP = ?, idCategorie = ?
WHERE idVideo = ? ;";
    $request = $db->prepare($sql);
    if ($request->execute(array($description, $title, $soustitre, $link, $mdp, $categorie, $idVideo))) {
        return true;
    } else {
        return false;
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
