<?php

class Home extends Controller
{
    public function index(){
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "Home",
            "vue" => "home",
        ];
        $this->view("core/header",$data);
        $this->view("landing",$data);
        $this->view("core/footer");
    }

    public function itemsData()
    {
        $data = $this->model('ItemModel')->getAllData();
        echo json_encode($data);
    }

    public function addToCart($item,$user)
    {
        $data["transactions_id"] = null;
        $data["item_id"]=$item;
        $data["user_id"]=$user;
        $data["quantity"] = 1;
        $data["status"] = "cart";
        $data["item_note"]="";
        if ($this->model('ItemSelectedModel')->insert($data)>0){
            echo json_encode(["response" => true]);
        }else{
            echo json_encode(["response" => false]);
        }
    }

    public function allCart($id)
    {
        $data = $this->model('ItemSelectedModel')->getSomeData($id);
        $response = [
            "response" => count($data)
        ];
        echo json_encode($response);
    }

    public function getUser()
    {
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        echo json_encode(["response" => $user["id"]]);
    }
}