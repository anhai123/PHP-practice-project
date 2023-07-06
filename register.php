<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <title>Archiiro Website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>REGISTER</header>
            <form action="">
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
                    <label>Email Address</label>
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
                    <label>Password</label>
                    <input type="password" name="pass2" placeholder="Confirm password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Register">
                </div>
            </form>
            <div class="link">You have account? <a href="login.php">Login now</a></div>
        </section>
    </div>
    <script src="javascript/showPass.js"></script>
    <script src="javascript/showError.js"></script>
</body>

</html>