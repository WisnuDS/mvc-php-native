<?php


class Shop extends Controller
{
    public function index()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "Shop",
            "vue" => "shop",
        ];
        $this->view('core/header',$data);
        $this->view('shop',$data);
        $this->view('core/footer');
    }
}