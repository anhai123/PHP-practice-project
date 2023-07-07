<?php
    session_start();
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('location:../index.php');
		exit();
	}
    include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Login Success!</p>
    <a href="logout.php">Logout</a>
</body>
</html>