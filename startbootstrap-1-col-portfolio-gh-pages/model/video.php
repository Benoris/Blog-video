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
function getVideo() {
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video`');
    $query->execute(array());
    return $query->fetchAll();
}

function getCategorie()
{
    $query = connectDb()->prepare('SELECT NomCategorie, idCategorie FROM categorie ');
    $query->execute(array());
    return $query->fetchAll();
}

function filterVideo($idCategorie)
{
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
    $sql = "INSERT INTO video(Titre,SousTitre,Description,Lien,MDP,idCategorie) " .
            " VALUES (:Titre, :SousTitre, :Description, :Lien, :MDP, :idCategorie)";
    $request = $db->prepare($sql);
    if ($request->execute(array(
                'Titre' => $title,
                'SousTitre' => $soustitre,
                'Description' => $description,
                'Lien' => $link,
                'MDP' => sha1($mdp),
                'idCategorie' => $categorie
            ))) {
        return $db->lastInsertID();
    } else {
        return NULL;
    }
}

function updateVideo($idVideo, $title, $soustitre, $description, $link, $mdp, $categorie) {
    $db = connectDb();
    $sql = "UPDATE video
SET Description=:description, Titre=:titre, SousTitre =:soustitre, Lien = :lien, MDP = :mdp, idCategorie = :categorie
WHERE idVideo = :idvideo ;";
    $request = $db->prepare($sql);
    if($request->execute(array(
        'description' => $description,
        'soustitre' => $soustitre,
        'titre' => $title,
        'lien' => $link,
        'mdp' => $mdp,
        'categorie' => $categorie,
        'idvideo' => $idVideo
    )))
    {
        return  $db->lastInsertId();
    }
    else{
        return NULL;
    }
}