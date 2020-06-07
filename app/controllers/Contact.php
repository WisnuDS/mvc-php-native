<?php


class Contact extends Controller
{
    public function index()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "Contact",
            "vue" => "contact",
        ];
        $this->view('core/header',$data);
        $this->view('contact');
        $this->view('core/footer');
    }
}