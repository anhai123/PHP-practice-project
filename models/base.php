<?php
require_once 'conn.php';
abstract class Base
{
    protected $conn;
    public function __construct()
    {
        $db = new dbConnect();
        $this->conn = $db->getConnection();
    }
    abstract function store($data);
    abstract function edit($id, $data);
    abstract function delete($id);
    abstract function list();
    abstract function findById($id);

    public function checkEmailDuplicate($email, $id)
    {
        $query = mysqli_query($this->conn, "select * from `user` where email='{$email}' and id_user <> '{$id}'");
        if (mysqli_num_rows($query) > 0) {
            return false;
        }
        return true;
    }
    public function login()
    {
        if (isset($_POST['login'])) {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if($_COOKIE['password']!=$password || $_COOKIE['email']!=$email){
                $password=md5($password);
            }

            $query = mysqli_query($this->conn, "select * from `user` where email='{$email}' && password='{$password}'");

            if (mysqli_num_rows($query) == 0) {
                $_SESSION['error'] = "Login Failed. User not Found!";
                header('location: ?mod=auth&act=viewLogin');
            } else {
                $row = mysqli_fetch_array($query);
                echo $row['role'];
                if(isset($_POST['remember'])){
                    setcookie("email", $row['email'], time() + (86400 * 30));
                    setcookie("password", $row['password'], time() + (86400 * 30));
                    }
                $_SESSION['role'] = $row['admin'];
                if (isset($_POSTp['remember'])) {
                    $row['id'] = 1;
                }
                $_SESSION['id'] = $row['id_user'];

                if ($row['role'] == 'admin') {
                    header('Location: ?mod=admin&act=viewAdminPage');
                } else if ($row['role'] == 'user') {

                    header('Location: ?mod=user&act=viewHomepage');
                }
            }
        } else {
            header('location: ?mod=auth&act=viewlogin');
            $_SESSION['error'] = "Please Login!";
        }
    }

    public function register()
    {
        

        $fname = mysqli_real_escape_string($this->conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($this->conn, $_POST['lname']);
        $email = mysqli_real_escape_string($this->conn, $_POST['email']);
        $phone = mysqli_real_escape_string($this->conn, $_POST['phone']);
        $pass1 = mysqli_real_escape_string($this->conn, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($this->conn, $_POST['pass2']);
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
        } 
       else  {
            $sql = mysqli_query($this->conn, "select * from `user` where email='{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                $validate['email'] = "Email already used";
                
            } 
          }
        if ($phone == '') {
            $validate['phone'] = 'Phone number is required';
        } else {
            if (!preg_match('/^[0-9]{10}+$/', $phone)) {
                $validate['phone'] = 'Phone number is not valid';
            }
        }

        if ($pass1 != $pass2) {
            $validate['password'] = 'Password is  not matched';
        } 
        else if(strlen($pass1) < 6) {
            $validate['password'] = 'Password has at least 6 digit';
        }
        if (!empty($validate)) {
            $_SESSION['validate'] = $validate;
            $_SESSION['input'] = $_POST;
            $_SESSION['error'] = 'User updated failed';
            header('location: ?mod=auth&act=viewRegister');
        } else {
            if ($pass1 == $pass2) {
                $pass1 = md5($pass1);
                $sql2 = "insert into user(firstName, lastName, email, password, phoneNumber, address, status)
                    value('$fname', '$lname', '$email', '$pass1','$phone','',0)";
                $query = mysqli_query($this->conn, $sql2);
                $_SESSION['success'] = "Create Account Success!";
                header('location: ?mod=auth&act=viewLogin');
            }
             else {
                $_SESSION['error'] = 'Create updated failed';
                header('Location: ?mod=user&act=viewRegister');
            }
        }


    }

    public function logout()
    {
        session_start();
        session_destroy();

        // if (isset($_COOKIE["user"]) and isset($_COOKIE["pass"])) {
        //     setcookie("user", '', time() - (3600));
        //     setcookie("pass", '', time() - (3600));
        // }

        header('location: ?mod=auth&act=viewLogin');
    }
    public function viewRegister()
    {
        require_once(__DIR__ . "/../views/register.php");
    }

    public function viewLogin()
    {
        require_once(__DIR__ . "/../views/login.php");
    }
}
