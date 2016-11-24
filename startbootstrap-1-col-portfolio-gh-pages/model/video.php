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
function getVideo()
{
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video`');
    $query->execute(array());
    return $query->fetchAll();
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
function addVideo($title, $soustitre, $description, $link, $mdp, $categorie) 
{
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

/**
 * fonction qui permet de créer un <select></select> avec des information comme son nom et ses options
 * @param type $name
 * @param type $options
 * @param type $default
 * @param type $class
 * @param type $id
 * @return string
 */
function select($name, $options, $default=null, $class=null, $id=null)
{
    $element = '<select name="' . $name . '" ';
    if (!empty($id)) { 
        $element .= 'id="' . $id . '" ';
    }
    if (!empty($class)) { 
        $element .= 'class="' . $class . '" ';
    }

    $element .= '>\n';
    foreach ($options as $key => $value)
        if ($key == $default)
            $element .= "<option value=\"$key\" selected=\"selected\">$value</option>\n";
        else
            $element .= "<option value=\"$key\" >$value</option>\n";

    $element .= "</select>";
    return $element;
}
