<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$mod = isset($_GET['mod'])?$_GET['mod']:'auth';
$act = isset($_GET['act'])?$_GET['act']:'viewLogin';

switch ($mod) {
    case 'auth':
        require_once('controllers/userController.php');
        $userController = new UserController();
        switch ($act) {
            case 'login':
                $userController->login();
                break;
            case 'logout':
                $userController->logout();
                break;
            case 'register':
                $userController->register();
                break;
            case 'viewLogin':
                $userController->viewLogin();
                break;
            case 'viewRegister':
                $userController->viewRegister();
                break;
            default:
                $userController->viewLogin();
                break;
        }
   break;
   case 'homepage':
    require_once('controllers/userController.php');
    $userController = new UserController();
    switch ($act) {
        case 'viewHomepage':
            $userController->viewHomepage();
            break;
        default:
            $userController->viewHomepage();
            break;
    }


}

