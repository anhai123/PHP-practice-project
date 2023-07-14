<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$mod = isset($_GET['mod'])?$_GET['mod']:'auth';
$act = isset($_GET['act'])?$_GET['act']:'viewLogin';

switch ($mod) {
    
    case 'admin':
        require_once('controllers/AdminController.php');
        $adminController = new AdminController();
        switch ($act) {
            case 'viewAdminPage':
                $adminController->list();
                break;
            case 'editUser':
                $adminController->edit();
                break;
            case 'deleteUser':
                $adminController->delete();
                break;
            default:
                $adminController->list();
                break;
        }
        break;
    case 'auth':
        require_once('models/User.php');
        $userController = new User();
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
   case 'user':
    require_once('controllers/UserController.php');
    $userController = new UserController();
    switch ($act) {
        case 'viewHomepage':
            $userController->viewHomepage();
            break;
        case 'updateInformation':
            $userController->edit();
            break;
        default:
            $userController->viewHomepage();
            break;
    }
    break;


}

