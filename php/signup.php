<?php
    session_start();
    include_once("conn.php");
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($pass1) && !empty($pass2)) {
        $sql = mysqli_query($conn, "select * from user where email='{$email}'");
        if(mysqli_num_rows($sql)>0){
            $_SESSION['message'] = "Email already used";
            header('location:register.php');
        }else{
            if($pass1 == $pass2){
                $pass1=md5($pass1);
                $sql2="insert into user(firstName, lastName, email, password, phoneNumber, address, status)
                    value('$fname', '$lname', '$email', '$pass1','$phone','',0)";
                $query = mysqli_query($conn, $sql2);
                $_SESSION['message'] = "Create Account Success!";
                header('location:register.php');
            }else{
                $_SESSION['message'] = "Password not match!";
                header('location:register.php');
            }
        }
    }
?>