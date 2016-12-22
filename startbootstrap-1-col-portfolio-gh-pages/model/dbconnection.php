<?php
/*
 * Nom du fichier : dbconnection.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : connexion à la BDD
 */


/**
 * fonction qui permet de se connecter à la bd
 * @return \PDO
 */
function connectDb ()
{
    $host = "localhost";
    $dbname = "db_blog_video";
    $user = "root";
    $password = "";
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    
    $bd = new PDO ('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user,$password,$pdo_options);
    
    return $bd;
}