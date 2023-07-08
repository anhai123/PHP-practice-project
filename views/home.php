<?php
    session_start();
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('location:../index.php');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD manipulation</title>
</head>
<body>
    
    <a href="?mod=auth&act=logout">Logout</a>
</body>
</html>