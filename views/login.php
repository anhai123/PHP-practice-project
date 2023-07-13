
<?php

$validate = $_SESSION['validate'] ?? [];
$input = $_SESSION['input'] ?? [];
unset($_SESSION['validate']);
unset($_SESSION['input']);
$string_version = implode( ",\n",$validate);
// echo $_SESSION['error'];
// echo implode("<br>",$validate);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="views/css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <title>Practice</title>
</head>
<body>
    <div class="wrapper">
        <div class="form login">
            <header>Login</header>
            <form method="post" action="?mod=auth&act=login">
                <div class="field input">
                    <label>Email Address</label>
                    <input 
                        type="text" 
                        name="email" 
                        value="<?php if (isset($_COOKIE["email"])){ echo $_COOKIE["email"]; }
                        else if(isset($input['email'])) {echo $input['email']; }?>" 
                        required
                    >
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input
                        type="password" 
                        name="password" 
                        value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}  else if(isset($input['password'])) {echo $input['password'] ;}?>"
                        required
                    >
                </div>
                <div class="checkbox">
                    <input type="checkbox" 
                        name="remember" 
                        class="remember-me" 
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
            <div class="link">You don't have account? <a href="?mod=auth&act=viewRegister"> Click here</a></div>
        </div>
    </div>
    <script src="views/javascript/showPass.js"></script>
    <script>
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
        });
        // Check if there is an error message in the session
        <?php if (isset($_SESSION['error'])) : ?>
            notyf.error('<?php echo $_SESSION['error'];  echo "<br>"; echo implode("<br>",$validate); ?>');
            <?php unset($_SESSION['error']);
            ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            notyf.success('<?php echo $_SESSION['success']; ?>');
            <?php unset($_SESSION['success']);
            ?>
        <?php endif; ?>
    </script>
</body>
</html>