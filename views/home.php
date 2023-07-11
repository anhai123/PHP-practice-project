
 <?php

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
		header('location: ?mod=auth&act=viewlogin');
		exit();
	}
$validate = $_SESSION['validate'] ?? [];
$input = $_SESSION['input'] ?? [];
unset($_SESSION['validate']);
unset($_SESSION['input']);
$string_version = implode( ",\n",$validate);
// echo $_SESSION['error'];
// echo implode("<br>",$validate);
// echo $user->getId();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="views/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <title>Practice</title>
</head>

<body>
    <div><button class="button-logout"> <a href="?mod=auth&act=logout">Logout</a></div>
    <div class="wrapper">
        <div class="form signup">
            <header>UPDATE INFORMATION</header>
            <form action="?mod=user&act=updateInformation" method="post">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" value="<?php echo $user->getFirstName(); ?>" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $user->getLastName(); ?>" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Enter your email" value="<?php echo $user->getEmail(); ?>" required>
                </div>
                <div class="field input">
                    <label>Phone number</label>
                    <input type="text" name="phone" placeholder="Enter your phone" value="<?php echo $user->getPhoneNumber(); ?>" required>
                </div>
                <div class="field button">
                    <input type="submit" name="signup" value="Update my inform">
                </div>

            </form>         
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
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
</html>