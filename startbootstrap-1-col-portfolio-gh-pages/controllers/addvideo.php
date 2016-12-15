<?php

$erreurs = array();

if (filter_has_var(INPUT_POST,'submit')) {
     // récupération des données provenant des données saisies par l'utilisateur
    $title = trim(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
    $soustitre = trim(filter_input(INPUT_POST,'soustitle',FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING));
    $link = trim(filter_input(INPUT_POST,'link',FILTER_SANITIZE_STRING));
    $mdp = trim(filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING));
    $categorie = filter_input(INPUT_POST, 'categorie',FILTER_VALIDATE_INT);
                                              // vérification des données saisies
    if (empty($title)){
        $errors['titre'] = "Le titre ne peut pas être vide";
    }
    if (empty($soustitre)){
        $errors['soustitre'] = "Le sous-titre ne peut pas être vide";
    }
    if (empty($description)){
        $errors['description'] = "La description ne peut pas être vide";
    }
    if (empty($link)){
        $errors['link'] = "Le lien ne peut pas être vide";
    }
    
                            // si il n'y a pas d'erreur dans les données saisies
    if (empty($errors)) 
        {
            require_once '../model/video.php';
            $idVideo = addVideo($title, $soustitre, $description, $link, $mdp,$categorie);
            header ("location:../index.php");
            //header ('location:index.php');
            exit;
    }
    else{
        header ("location:../index.php");
        exit();
    }
}
else{
    header ("location:../index.php");
        exit();
}
