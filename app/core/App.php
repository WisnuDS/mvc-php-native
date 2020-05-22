<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params =[];
    public function __construct()
    {
        $url = $this->parseUrl();
        //Controller file
        if(isset($url[0])){
            if(file_exists('../app/controllers/' . ucfirst($url[0]) . '.php')){
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
                require_once '../app/controllers/' . $this->controller . '.php';
                $this->controller = new $this->controller;
            }else{
                $this->setNotFound();
            }
        }else{
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        }

        //Method checking
        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }else{
                $this->setNotFound();
            }
        }
    
        //params checking
        if(!empty($url)){
            $this->params = array_values($url);
        }

        //return controller and method
        call_user_func_array([$this->controller,$this->method],$this->params);
        
    }

    private function parseUrl(){
        if (isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url);
            $url = explode("/",$url);
            return $url;
        }
    }

    public function setNotFound()
    {
        $this->controller = 'Controller';
        $this->method = 'notFound';
        require_once '../app/core/' . $this->controller . '.php';
        $this->controller = new $this->controller;
    }
}
