<?php

require_once 'base.php';
class UserController extends Base
{
    public function login()
    {
        if (isset($_POST['login']) && $_POST['login']) {
            session_start();
            $dbConnect = new dbConnect();

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            if ($_COOKIE['password'] != $password || $_COOKIE['email'] != $email) {
                $password = md5($password);
            }

            $query = mysqli_query($this->conn, "select * from `user` where email='{$email}' && password='{$password}'");

            if (mysqli_num_rows($query) == 0) {
                $_SESSION['message'] = "Login Failed. User not Found!";
                header('location: ?mod=auth&act=viewLogin');
            } else {
                $row = mysqli_fetch_array($query);

                if (isset($_POST['remember'])) {
                    setcookie("email", $row['email'], time() + (86400 * 30));
                    setcookie("password", $row['password'], time() + (86400 * 30));
                }

                // if(isset($_POST['remember'])){
                //     $row['id'] = 1;
                // }

                $_SESSION['id'] = $row['id_user'];
                header('location: ?mod=homepage&act=viewHomepage');
            }
        } else {
            header('location: ../index.php');
            $_SESSION['message'] = "Please Login!";
        }
    }

    public function register()
    {
        session_start();

        $fname = mysqli_real_escape_string($this->conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($this->conn, $_POST['lname']);
        $email = mysqli_real_escape_string($this->conn, $_POST['email']);
        $phone = mysqli_real_escape_string($this->conn, $_POST['phone']);
        $pass1 = mysqli_real_escape_string($this->conn, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($this->conn, $_POST['pass2']);

        if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($pass2)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = mysqli_query($this->conn, "select * from user where email='{$email}'");
                if (mysqli_num_rows($sql) > 0) {
                    $_SESSION['message'] = "Email already used";
                    header('location: ?mod=auth&act=viewRegister');
                } else {
                    if ($pass1 == $pass2) {
                        $pass1 = md5($pass1);
                        $sql2 = "insert into user(firstName, lastName, email, password, phoneNumber, address, status)
                        value('$fname', '$lname', '$email', '$pass1','$phone','',0)";
                        $query = mysqli_query($this->conn, $sql2);
                        $_SESSION['message'] = "Create Account Success!";
                        header('location: ?mod=auth&act=viewLogin');
                    } else {
                        $_SESSION['message'] = "Password not match!";
                        header('location: ?mod=auth&act=viewRegister');
                    }
                }
            } else {
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();

        // if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
        //     setcookie("user", '', time() - (3600));
        //     setcookie("pass", '', time() - (3600));
        // }

        header('location: ?mod=auth&act=viewLogin');
    }

    public function viewLogin()
    {
        require_once(__DIR__ . "/../views/login.php");
    }
    public function viewHomepage()
    {
        require_once(__DIR__ . "/../views/home.php");
    }

    public function viewRegister()
    {
        require_once(__DIR__ . "/../views/register.php");
    }

    public function findById($id)
    {
        $userModel = new UserController();
        $user = $userModel->findById($id);
        return $user;
    }

    function store($data)
    {
    }
    function edit($id, $data)
    {
    }
    function delete($id)
    {
    }
    function list()
    {
    }
};
