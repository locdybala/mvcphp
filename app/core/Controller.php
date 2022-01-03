<?php 
class Controller{
    public function model($model){
        if(file_exists('./app/models/'.$model.'.php')){
            require './app/models/'.$model.'.php';
            if(class_exists($model)){
                $model=new $model();
                return $model;
            }
            else{
                return false;
            }
        }
    }
    public function render($view,$data){
        if(file_exists('./app/views/'.$view.'.php')){
        }
    }
}