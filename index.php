<?php
    session_start();
    include("./php/conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Practice</title>
</head>
<body>
    <div class="wrapper">
        <div class="form login">
            <header>Login</header>
            <form method="post" action="php/login.php">
                <div class="field input">
                    <label>Email Address</label>
                    <input 
                        type="text" 
                        name="email" 
                        value="<?php if (isset($_COOKIE["email"])){ echo $_COOKIE["email"]; }?>" 
                        required
                    >
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input
                        type="password" 
                        name="password" 
                        value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"
                        required
                    >
                    <i class="fas fa-eye"></i>
                </div>
                <div class="checkbox">
                    <input type="checkbox" 
                        name="remember" 
                        class="remember-me" 
                        <?php 
                            if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])){ echo "checked"; }   
                        ?>
                    >
                    <label for="remember-me">Remember-me</label>
                </div>
                <div class="field button">
                    <input type="submit" value="Login" name="login">
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
            <div class="link">You don't have account? <a href="php/register.php"> Click here</a></div>
        </div>
    </div>
    <script src="javascript/showPass.js"></script>
</body>
</html>