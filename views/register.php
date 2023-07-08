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
            <form action="?mod=auth&act=register" method="post">
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
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="pass1" placeholder="Enter password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>Confirm password</label>
                    <input type="password" name="pass2" placeholder="Confirm password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="signup" value="Register">
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
            <div class="link">You have account? <a href="/PHP-practice-project/?mod=auth&act=viewLogin">Login now</a></div>
        </div>
    </div>
    <script src="views/javascript/showPass.js"></script>
</body>
</html>