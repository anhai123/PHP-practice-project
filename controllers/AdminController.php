<?php
require_once(__DIR__ . '/../models/Admin.php');
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userId = $user['id'];
    $userName = $user['name'];
}

class AdminController
{
    var $modelAdmin;


    function __construct()
    {
        $this->modelAdmin = new Admin();
        
    }
    public function viewAdmin() {
        require_once(__DIR__ . "/../views/admin.php");
    }
    function list(){
        $users = $this->modelAdmin->list();
        require_once(__DIR__ . '/../views/admin.php');
    }

    function delete()
    {
        if ($_POST['action'] == 'delete' && $_POST['id']) {
           $user =  $this->modelAdmin->findById($_POST['id']);
            if ( $user->getRole() != 'admin') {
                $status = $this->modelAdmin->delete($_POST['id']);
                if ($status == true) {
                    $_SESSION['success'] = 'User deleted successfully';
                    $data = array(
                        "message"	=> "Record deleted success",	
                        "status" => 1
                    );
                    echo json_encode($data);
                } else {
                    $_SESSION['fail'] = 'User deleted failed';
                    $data = array(
                        "message"	=> "Record Updated",	
                        "status" => 0
                    );
                    echo json_encode($data);
                }
            }
          else {
            $_SESSION['error'] = 'Admin cant be deleted ';
            $data = array(
                "message"	=> "Record deleted fail",	
                "status" => 0
            );
            echo json_encode($data);
          }
        }
    }


    function add()
    {

    }
    function edit() {
        $array = array();
if ($_POST['action'] == 'edit' && $_POST['id']) {	

    $firstName= isset($_POST['firstName']) && $_POST['firstName'] == true ?trim($_POST['firstName'], " ") : '';
    $lastName= isset($_POST['lastName']) && $_POST['lastName'] == true ?trim($_POST['lastName'], " ") : '';
    $email= isset($_POST['email']) && $_POST['email'] == true ? trim($_POST['email'], " ") : '';
    $phoneNumber= isset($_POST['phoneNumber']) && $_POST['phoneNumber'] == true ? trim($_POST['phoneNumber'], " ") : '';


if(isset($_POST['firstName'])) { $array[] = "firstName='".$firstName."'"; }
if(isset($_POST['lastName'])) { $array[] = "lastName='".$lastName."'";}
if(isset($_POST['email'])) { $array[] = "email='".$email."'"; }
if(isset($_POST['phoneNumber'])) { $array[] = "phoneNumber='".$phoneNumber."'"; }
if (count($array) == 0) { die("no object modified or other errors");}

$validate = [];
if ($firstName == '' ) {
    $validate['firstName'] = 'First name is required';
}

if ($lastName == '') {
    $validate['lastName'] = 'Last name is required';
}
if ($email == ''  ) {
    $validate['email'] = 'Email is required';
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validate['email'] = 'Not a valid email';
}

else {
    if(!$this->modelAdmin->checkEmailDuplicate($email, $_POST['id'])) {
        $validate['email'] = 'Email has already exist';
    }
}


if ($phoneNumber == '') {
    $validate['phoneNumber'] = 'Phone number is required';
}
else  {
    if(!preg_match('/^[0-9]{10}+$/', $phoneNumber)) {
        $validate['phoneNumber'] = 'Phone number is not valid';
    }

}
if (!empty($validate)) {
    $_SESSION['validate'] = $validate;
    $_SESSION['input'] = $_POST;
    $_SESSION['error'] = 'User updated failed';
    $data = array(
        "message"	=> "Error when update user",	
        "status" => 0
    );
    echo json_encode($data);
    
}
else {
    $userUpdate = $this->modelAdmin->edit($_POST['id'], $array);
    if ($userUpdate == true) {
        $_SESSION['success'] = 'User updated successfully';
        $data = array(
            "message"	=> "User Updated",	
            "status" => 1
        );
        echo json_encode($data);
        // $this->list();
        // header('Location: ?mod=admin&act=viewAdminPage');
    } else {
        $_SESSION['error'] = 'User updated failed';
        $data = array(
            "message"	=> "Error when update user",	
            "status" => 0
        );
        echo json_encode($data);
    
    }
}

}
    }

}