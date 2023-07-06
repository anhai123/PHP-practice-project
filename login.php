<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Archiiro Website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>REGISTER</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" class="remember-me">
                    <label for="remember-me">Remember-me</label>
                </div>
                <div class="field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">You don't have account? <a href="register.php"> Click here</a></div>
        </section>
    </div>

    <script src="javascript/showPass.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>