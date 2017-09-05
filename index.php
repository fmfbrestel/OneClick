<?php
    require_once('models/database.php');
    require_once('models/databaseFunctions.php');
    session_start();
    
    $action = filter_input(INPUT_POST, 'action');
    
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL && (!isset($_SESSION['user']) || $_SESSION['user'] == 'unk')) {
            $_SESSION['user'] = 'unk';
            $action = 'mississippi';
        } else if($action == NULL && $_SESSION['user'] != 'unk') {
            $action = 'mississippi';
        }
    }
    
     switch ($action) {
        case 'mississippi':
            
            include('./views/Mississippi.php');
            break;
     }
?>
