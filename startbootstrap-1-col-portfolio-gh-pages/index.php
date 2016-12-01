<?php 

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);
if (empty($action)) {
    $action = 'listvideo';
}

try {
    switch ($action) {
        case 'listvideo':
            require_once 'controllers/listvideo.php';
            break;
        case 'addvideo':
            require_once 'view/addform.php';
            break;
        case 'register':
            echo "coucou";
            //require_once 'controllers/addvideo.php';
           //break;
            var_dump($_POST) ;
        default:
    }
} catch (Exception $e) {
    require_once 'views/500.php';
}


