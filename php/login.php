<?php
	if(isset($_POST['login'])){
		session_start();
		include('conn.php');

		$email=$_POST['email'];
		$password=md5($_POST['password']);

		$query=mysqli_query($conn,"select * from `user` where email='{$email}' && password='{$password}'");

		if (mysqli_num_rows($query) == 0){
			$_SESSION['message']="Login Failed. User not Found!";
			header('location:../index.php');
		}
		else{
			$row=mysqli_fetch_array($query);

			setcookie("email", $row['email'], time() + (86400 * 30)); 
			setcookie("password", $row['password'], time() + (86400 * 30)); 

			if(isset($_POSTp['remember'])){
				$row['id'] = 1;
			}
			$_SESSION['id']=$row['id_user'];
			header('location:home.php');
		}
	}
	else{
		header('location: ../index.php');
		$_SESSION['message']="Please Login!";
	}
?>