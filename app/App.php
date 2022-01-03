<?php 

class App{
    private $controller,$action,$params,$routes;
     public function __construct()
     {
         global $routes;
         $this->routes = new Route();
         if(!empty($routes['default_controller'])){
             $this->controller=$routes['default_controller'];
         }
         $this->action='index';
         $this->params=[];
         $this->handleUrl();
     }
     public function getUrl(){
        if(!empty($_SERVER['PATH_INFO'])){
            $url=$_SERVER['PATH_INFO'];
        }
        else{
            $url='/';
        }
        return $url;
     }
     public function handleUrl(){

        $url=$this->getUrl();
        $url=$this->routes->handleRoute($url);
        $urlArr=array_filter( explode('/',$url));
        $urlArr=array_values($urlArr);

        $urlCheck='';
        if(!empty($urlArr)){

            foreach($urlArr as $key=>$item){
                $urlCheck.=$item.'/';
                $fileCheck=rtrim($urlCheck,'/');
                $fileArr=explode('/',$fileCheck);
                $fileArr[count($fileArr)-1]=ucfirst($fileArr[count($fileArr)-1]);
                $fileCheck=implode('/',$fileArr);
                if(!empty($urlArr[$key-1])){
                    unset($urlArr[$key-1]);
                }
                if(file_exists('app/controllers/'.($fileCheck).'.php')){
                    $urlCheck=$fileCheck;
                    break;
                }
            }
            $urlArr=array_values($urlArr);
        }

        if(!empty($urlArr[0])){
            $this->controller=ucfirst( $urlArr[0]);
        }
        else{
            $this->controller=ucfirst( $this->controller);
        }
        if(empty($urlCheck)){
            $urlCheck=$this->controller;
        }
        if(file_exists('app/controllers/'.$urlCheck.'.php')){
            require_once 'app/controllers/'.$urlCheck.'.php';
            
            //Kiểm tra class $this->controller có tồn tại
            if(class_exists($this->controller)){

                $this->controller=new $this->controller();
                unset($urlArr[0]);
            }
            else{
                $this->loadError();
            }
        }else{
            $this->loadError();
        }
        //xử lý action
        if(!empty($urlArr[1])){
            $this->action=$urlArr[1];
            unset($urlArr[1]);

        }

        // xử lý params
        $this->params=array_values($urlArr);
        
        //Kiểm tra method tồn tại
        if(method_exists($this->controller,$this->action)){

            call_user_func_array([$this->controller,$this->action],$this->params);
        }
        else{
            $this->loadError();
        }

     }
     public function loadError($name='404'){
         require_once 'errors/'.$name.'.php';
     }
}