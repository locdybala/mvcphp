<?php
class User extends Controller
{
    public $model_user;
    function __construct()
    {
        $this->model_user = $this->model('UserModel');
        
    }
    public  function index()
    {
        $data = $this->model_user->getList();
        $this->render('users/index',$data);
    }
    public function create(){ 
        $this->render('users/create');
    }
    public function store(){
        $errors = [];

        if (strlen($_POST['first_name']) === 0) {
            $errors['first_name'] = "First name is required";
        }

        if (strlen($_POST['last_name']) === 0) {
            $errors['last_name'] = "Last name is required";
        }

        if (count($errors) === 0) {
            $isCreated = $this->model_user->create($_POST);
            if ($isCreated) {
                header('location:/mvc/user/index');
            }
        }
    }
    public function edit($id){
        $data=$this->model_user->edit($id);
        $this->render('users/update',$data);
    }
    public function update(){
        $errors = [];
        $id=$_POST['id'];
        if (isset($_POST['first_name']) && strlen($_POST['first_name']) === 0) {
            $errors['first_name'] = "First name is required";
        }

        if (isset($_POST['last_name']) && strlen($_POST['last_name']) === 0) {
            $errors['last_name'] = "Last name is required";
        }

        if (count($errors) === 0) {
            $isCreated = $this->model_user->update($_POST, $id);
            if ($isCreated) {
                header('location:/mvc/user/index');
            }
        }
    }
    public function destroy($id){
        $result=$this->model_user->destroy($id);
        if ($result) {
            header('location:/mvc/user/index');
        }
    }
}
