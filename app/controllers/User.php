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
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
