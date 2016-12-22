<?php

/**
 * Nom du fichier : listcategorie.php
 * Auteur : Pascucci Lino / Dinh Tony
 * 24.11.2016
 * Description : controlleur qui affiche qui permet d'afficher dans la view les catégorie
 */

require_once 'model/video.php';

$categories = getCategorie();

include 'view/addform.php';