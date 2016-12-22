<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$idVideo = filter_input(INPUT_POST, 'idVideo', FILTER_VALIDATE_INT);

require_once 'model/video.php';

$video = getVideo($idVideo);
$categories = getCategorie();

include 'view/updateform.php';