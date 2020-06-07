<?php


class Controller
{
    public function view($path,$data = [])
    {
        require_once '../app/views/'.$path.'.php';
    }

    public function model($model)
    {
        require_once '../app/models/'.$model.'.php';
        return new $model;
    }

    public function notFound(){
        $this->view('404');
    }

    public function getSession()
    {
        echo json_encode(["response" =>$_SESSION['auth']]);
    }
}