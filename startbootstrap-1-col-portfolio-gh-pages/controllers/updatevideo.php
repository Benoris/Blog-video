<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'model/video.php';

$video = getVideo($_POST['idVideo']);
$categories = getCategorie();

include 'view/updateform.php';