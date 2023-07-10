<!-- <?php
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
</html> -->


 <?php
    session_start();
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('location: ?mod=auth&act=viewlogin');
		exit();
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="views/css/login.css">
    <title>Practice</title>
</head>

<body>
    <div class="wrapper">
        <div class="form signup">
            <header>REGISTER</header>
            <form action="?mod=auth&act=updateInformation" method="post">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Phone number</label>
                    <input type="text" name="phone" placeholder="Enter your phone" required>
                </div>
                <div class="field button">
                    <input type="submit" name="signup" value="Update my inform">
                </div>
                <!-- <div class="message">
                    <?php
		                if (isset($_SESSION['message'])){
                            echo $_SESSION['message'];
		                }
		                unset($_SESSION['message']);
	                ?>
                </div> -->
            </form>         
        </div>
    </div>
</body>
</html>