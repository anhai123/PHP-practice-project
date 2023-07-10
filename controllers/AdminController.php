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

    function list(){
        $users = $this->modelAdmin->list();
        require_once(__DIR__ . '/../views/admin.php');
     }


    function store()
    {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $image_url = isset($_POST['img_url']) ? $_POST['img_url'] : '';

        // Validate
        $validate = [];
        if ($name == '') {
            $validate['name'] = 'Name is required';
        }
        if ($description == '') {
            $validate['description'] = 'Description is required';
        }
        if ($image_url == '') {
            $validate['img_url'] = 'Image is required';
        }
        if (!empty($validate)) {
            $_SESSION['validate'] = $validate;
            $_SESSION['input'] = $_POST;
            header('Location: ?mod=restaurant&act=add');
            return;
        }

        $input = [
            'name' => $name,
            'description' => $description,
            'img_url' => $image_url,
            'user_id' => $this->user_id
        ];

        $status = $this->modelAdmin->store($input);
        if ($status == true) {
            $_SESSION['success'] = 'Thêm mới thành công';
            $data = array(
                "message"	=> "Record Updated",	
                "status" => 1
            );
            echo json_encode($data);
            header('Location: ?mod=restaurant&act=list');
        } else {
            $_SESSION['fail'] = 'Thêm mới thất bại';
            header('Location: ?mod=restaurant&act=add');
        }
    }

    function delete()
    {
        if ($_POST['action'] == 'delete' && $_POST['id']) {

            $status = $this->modelAdmin->delete($_POST['id']);
            if ($status == true) {
                $_SESSION['success'] = 'User deleted successfully';
                $data = array(
                    "message"	=> "Record Updated",	
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
    }

    function isAuthor($restaurantId)
    {
        $restaurant = $this->model->findById($restaurantId);
        if ($restaurant['user_id'] == $this->user_id) {
            return true;
        } else {
            return false;
        }
    }

    function add()
    {

    }
    function edit() {
        $array = array();
if ($_POST['action'] == 'edit' && $_POST['id']) {	
if(isset($_POST['firstName'])) { $array[] = "firstName='".$_POST['firstName']."'"; }
if(isset($_POST['lastName'])) { $array[] = "lastName='".$_POST['lastName']."'";}
if(isset($_POST['email'])) { $array[] = "email='".$_POST['email']."'"; }
if(isset($_POST['phoneNumber'])) { $array[] = "phoneNumber='".$_POST['phoneNumber']."'"; }
if (count($array) == 0) { die("no object modified or other errors");}
$firstName=isset($_POST['firstName'])?$_POST['firstName'] : '';
$lastName=isset($_POST['lastName'])?$_POST['lastName'] : '';
$email=isset($_POST['email'])?$_POST['email'] : '';
$phoneNumber=isset($_POST['phoneNumber'])?$_POST['phoneNumber'] : '';
$validate = [];
if ($firstName == '') {
    $validate['firstName'] = 'First name is required';
}
if ($lastName == '') {
    $validate['lastName'] = 'Last name is required';
}
if ($email == '') {
    $validate['email'] = 'email is required';
}
if ($phoneNumber == '') {
    $validate['phoneNumber'] = 'Phone number is required';
}
if (!empty($validate)) {
    $validate['id'] = $_POST['id'];
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
    public function viewAdmin() {
        require_once(__DIR__ . "/../views/admin.php");
    }
}
