<?php 

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_URL);
if (empty($action)) {
    $action = 'listusers';
}

try {
    switch ($action) {
        case 'listusers':
            require_once 'controllers/listusers.php';
            break;
        case 'edituser':
            require_once 'controllers/edituser.php';
            break;
        case 'saveuser':
            require_once 'controllers/saveuser.php';
            break;
        case 'deleteuser':
            require_once 'controllers/deleteuser.php';
            break;
        case 'listevents':
            require_once 'controllers/listevents.php';
            break;
        case 'editevent':
            require_once 'controllers/editevent.php';
            break;
        case 'saveevent':
            require_once 'controllers/saveevent.php';
            break;
        case 'deleteevent':
            require_once 'controllers/deleteevent.php';
            break;
        default:
            require_once 'views/404.php';
    }
} catch (Exception $e) {
    require_once 'views/500.php';
}


