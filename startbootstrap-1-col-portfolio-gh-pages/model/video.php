<?php

require_once 'dbconnection.php';

function getVideo()
{
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video` ');
    $query->execute(array());
    return $query->fetchAll();
}

require_once 'dbconnection.php';

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
