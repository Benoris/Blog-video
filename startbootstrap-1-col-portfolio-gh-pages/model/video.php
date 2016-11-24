<?php

require_once 'dbconnection.php';

function getVideo()
{
    $query = connectDb()->prepare('SELECT `idVideo`, `Titre`, `SousTitre`, `Description`, `Lien`, `MDP` FROM `video` ');
    $query->execute(array());
    return $query->fetchAll();
}

