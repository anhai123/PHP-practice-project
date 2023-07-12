<?php
require_once(__DIR__ . '/../models/User.php');
class UserController
{
    var $modelUser;


    function __construct()
    {
        $this->modelUser = new User();
    }
    public function viewHomepage()
    {
        $user = $this->modelUser->findById($_SESSION['id']);
        require_once(__DIR__ . "/../views/home.php");
    }



    function edit()
    {
        $array = array();


        $fname = isset($_POST['fname']) && $_POST['fname'] == true ? trim($_POST['fname'], " ") : '';
        $lname = isset($_POST['lname']) && $_POST['lname'] == true ? trim($_POST['lname'], " ") : '';
        $email = isset($_POST['email']) && $_POST['email'] == true ? trim($_POST['email'], " ") : '';
        $phone = isset($_POST['phone']) && $_POST['phone'] == true ? trim($_POST['phone'], " ") : '';


        if (isset($_POST['fname'])) {
            $array[] = "firstName='" . $fname . "'";
        }
        if (isset($_POST['lname'])) {
            $array[] = "lastName='" . $lname . "'";
        }
        if (isset($_POST['email'])) {
            $array[] = "email='" . $email . "'";
        }
        if (isset($_POST['phone'])) {
            $array[] = "phoneNumber='" . $phone . "'";
        }
        if (count($array) == 0) {
            die("no object modified or other errors");
        }

        $validate = [];
        if ($fname == '') {
            $validate['fname'] = 'First name is required';
        }

        if ($lname == '') {
            $validate['lname'] = 'Last name is required';
        }
        if ($email == '') {
            $validate['email'] = 'Email is required';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validate['email'] = 'Not a valid email';
        } else {
            if (!$this->modelUser->checkEmailDuplicate($email, $_SESSION['id'])) {
                $validate['email'] = 'Email has already exist';
            }
        }

        if ($phone == '') {
            $validate['phone'] = 'Phone number is required';
        } else {
            if (!preg_match('/^[0-9]{10}+$/', $phone)) {
                $validate['phone'] = 'Phone number is not valid';
            }
        }
        if (!empty($validate)) {
            $_SESSION['validate'] = $validate;
            $_SESSION['input'] = $_POST;
            $_SESSION['error'] = 'User updated failed';
            header('Location: ?mod=user&act=viewHomepage');
        } else {
            $userUpdate = $this->modelUser->edit($_SESSION['id'], $array);
            if ($userUpdate == true) {
                $_SESSION['success'] = 'User updated successfully';
                header('Location: ?mod=user&act=viewHomepage');
            } else {
                $_SESSION['error'] = 'User updated failed';
                header('Location: ?mod=user&act=viewHomepage');
            }
        }
    }
}
