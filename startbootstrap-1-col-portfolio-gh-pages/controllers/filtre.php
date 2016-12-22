<?php

require_once 'model/video.php';
$idCategorie = filter_input(INPUT_POST, 'categorie', FILTER_VALIDATE_INT);

if(filter_has_var(INPUT_POST, 'rechercher')){ 
    
    filterVideo($idCategorie);
    //include 'controllers/listvideo.php';
    include 'view/showvideo.php';
}

