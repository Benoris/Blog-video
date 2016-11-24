<?php

require_once '../model/video.php';

addVideo($title, $soustitre, $description, $link, $mdp, $categorie);

header("Location:listvideo.php");


$erreurs = array();

if (filter_has_var(INPUT_POST,'submit')) {
     // récupération des données provenant des données saisies par l'utilisateur
    
    $idVideo = filter_input(INPUT_POST, 'idVideo',FILTER_VALIDATE_INT);
    $title = trim(filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING));
    $soustitre = trim(filter_input(INPUT_POST,'soustitre',FILTER_SANITIZE_STRING));
    $description = trim(filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING));
    $link = trim(filter_input(INPUT_POST,'link',FILTER_SANITIZE_STRING));
    $mdp = trim(filter_input(INPUT_POST,'pwd',FILTER_SANITIZE_STRING));
    $categorie = filter_input(INPUT_POST, 'categorie',FILTER_VALIDATE_INT);
                                              // vérification des données saisies
    if (empty($LastName))
        $errors['LastName'] = "Le nom ne peut pas être vide";
    if (empty($FirstName))
        $errors['FirstName'] = "Le prénom ne peut pas être vide";
    if (empty($Pseudo))
        $errors['Pseudo'] = "Le pseudo ne peut pas être vide";
    if (empty($Pwd))
        $errors['Pwd'] = "Le mot de passe ne peut pas être vide";
    if ($Pwd != $Pwd2)
        $errors['Pwd2'] = "Les deux mots de passes sont différents";
    
                            // si il n'y a pas d'erreur dans les données saisies
    if (empty($errors)) {

            require_once 'model/users.php';
            if (is_numeric($idUser)) {
                updateUser($idUser,$LastName, $FirstName, $Pseudo, $Pwd);
                SetMessageFlash("Utilisateur modifié ($FirstName $LastName / $Pseudo)");        
            } else {
            $idUser = addUser($LastName, $FirstName, $Pseudo, $Pwd);
            SetMessageFlash("Utilisateur ajouté ($FirstName $LastName / $Pseudo)");
            }
            header("location:listusers.html");
            exit;
    }
}

include 'views/userform.php';