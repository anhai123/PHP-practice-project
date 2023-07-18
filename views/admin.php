<?php
    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '') || $_SESSION['role'] != "admin" ) {
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
  <style>
table {
    background-color: #00B98E;
}
table, .table {
    color: #fff;
}

.button-logout{
    background-color: #00d6b091; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
  } 
</style>
</head>
<body>
<div><button class="button-logout"> <a href="?mod=auth&act=logout">Logout</a></div>
	<br><br/>
<table id="editableTable" class="table table-bordered">
	<thead>
		<tr>
			<th>Id</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>		
			<th>Phone number</th>											
		</tr>
	</thead>
	<tbody>
		   <?php foreach ($users as $user) {
        ?>
  <tr id=<?php echo $user->getId() ?>>
  <td><?php echo $user->getId(); ?></td>
		   <td title="<?php if (isset($validate['firstName']) && $user->getId() == $input['id']  ) : ?>
                        <?php echo $validate['firstName']; ?>
                    <?php endif; ?>"><?php echo htmlspecialchars($user->getFirstName()); ?></td>
		   <td title="<?php if (isset($validate['lastName']) && $user->getId() == $input['id'] ) : ?>
                        <?php echo $validate['lastName']; ?>
                    <?php endif; ?>"><?php echo htmlspecialchars($user->getLastName()); ?></td>               
		   <td title="<?php if (isset($validate['email']) && $user->getId() == $input['id'] ) : ?>
                       <?php echo $validate['email']; ?>
                    <?php endif; ?>"><?php echo $user->getEmail(); ?></td>
		   <td title="<?php if (isset($validate['phoneNumber']) && $user->getId() == $input['id']  ) : ?>
                        <?php echo $validate['phoneNumber']; ?>
                    <?php endif; ?>"><?php echo $user->getPhoneNumber(); ?></td>  				   				   				  
		   </tr>
        <?php
        }
        ?>
	</tbody>
</table>
</div>

</body>

<script src="views/javascript/editable.js"></script>
<script src="views/javascript/bootstable.js"></script>
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