<?php

/*
 * Nom du fichier : video.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : modèle qui contient les fonction pour les (la) vidéo(s)
 */

require_once 'dbconnection.php';//pour pouvoir se connecter à la BDD

/**
 * fonction qui retourne une liste avec les données sur les vidéos
 * @return type
 */
function getVideos() {
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video`');
    $query->execute(array());
    return $query->fetchAll();
}
/**
 * Récupère une vidéo en fonction de son Id
 * @param type $idVideo
 * @return type
 */
function getVideo($idVideo) {
    $db = connectDb();
    $query = $db->prepare("SELECT * FROM video WHERE idVideo = ?");
    $query->execute(array($idVideo));
    $line = $query->fetch();
    return $line;
}

/**
 * Récupère toute les catégories
 * @return type
 */
function getCategorie() {
    $query = connectDb()->prepare('SELECT NomCategorie, idCategorie FROM categorie ');
    $query->execute(array());
    return $query->fetchAll();
}

/**
 * cette fonction nous permet de filtrer les vidéos
 * @param type $idCategorie
 * @return type
 */
function filterVideo($idCategorie) {
    $bdd = connectDb();
    $sql = "SELECT * FROM video WHERE `idCategorie` =?";
    $query = $bdd->prepare($sql);
    $query->execute(array($idCategorie));
    $result = $query->fetch();
    return $result;
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
 * Suppression de données (des vidéos)
 * @param type $idVideo
 */
function deleteVideo($idVideo) {
    $db = connectDb();
    $query = $db->prepare("DELETE FROM video WHERE idVideo = ?");
    return ($query->execute(array($idVideo)));
}

/**
 * Controle si le mot de passe est juste en fonction de la vidéo qu'on a séléctioné
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
