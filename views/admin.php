<?php
$validate = $_SESSION['validate'] ?? [];
$input = $_SESSION['input'] ?? [];
unset($_SESSION['validate']);
unset($_SESSION['input']);
// $string_version = implode(',', $validate);
// echo $string_version;

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
    background-color: #181818;
}
table, .table {
    color: #fff;
}
</style>
</head>
<body>
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
		   <td><?php echo $user->getFirstName(); ?>
           <?php if (isset($validate['firstName']) && $user->getId() == $validate['id']  ) : ?>
                        <p class="text-danger"><?php echo $validate['firstName']; ?></p>
                    <?php endif; ?></td>
		   <td><?php echo $user->getLastName(); ?>
        
           <?php if (isset($validate['lastName']) && $user->getId() == $validate['id']  ) : ?>
                        <p class="text-danger"><?php echo $validate['lastName']; ?></p>
                    <?php endif; ?></td></td>
		   <td><?php echo $user->getEmail(); ?>
           <?php if (isset($validate['email']) && $user->getId() == $validate['id']  ) : ?>
                        <p class="text-danger"><?php echo $validate['email']; ?></p>
                    <?php endif; ?></td></td>
		   <td><?php echo $user->getPhoneNumber(); ?>
           <?php if (isset($validate['phoneNumber']) && $user->getId() == $validate['id']  ) : ?>
                        <p class="text-danger"><?php echo $validate['phoneNumber']; ?></p>
                    <?php endif; ?></td></td>  				   				   				  
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
            notyf.error('<?php echo $_SESSION['error']; ?>');
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