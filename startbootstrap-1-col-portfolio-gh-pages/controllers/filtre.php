<?php

require_once 'model/video.php';

if(filter_has_var(INPUT_POST, 'submit')){
    if(isset($_POST['idCategorie']))
    {
        $id = $_POST['idCategorie'];
    }
    
    filterVideo($id);
    include 'view/showvideo.php';
}



