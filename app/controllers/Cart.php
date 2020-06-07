<?php


class Cart extends Controller
{
    public function index()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "Cart",
            "vue" => "cart",
        ];
        $this->view('core/header',$data);
        $this->view('cart',$data);
        $this->view('core/footer',$data);
    }

    public function allCart($user_id)
    {
        $query = "SELECT i.*,it.* FROM item_selected it JOIN items i ON it.item_id = i.id WHERE user_id = ".$user_id." && status = 'cart'";
        $data = $this->model('ItemSelectedModel')->manualQuery($query);
        echo json_encode($data);
    }

    public function deleteCart($id)
    {
        if ($this->model('ItemSelectedModel')->delete($id) > 0){
            echo json_encode(["response"=>"success"]);
        }else{
            echo json_encode(["response"=>"failed"]);
        }
    }

    public function updateCart($id,$quantity)
    {
        $data['quantity'] = $quantity;
        if ($this->model('ItemSelectedModel')->update($data,$id) > 0){
            echo json_encode(["response"=>"success"]);
        }else{
            echo json_encode(["response"=>"failed"]);
        }
    }
    public function updateNoteCart()
    {
        $request_body = file_get_contents('php://input');
        $request_data = json_decode($request_body,true);
        $id = $request_data['id'];
        $data["item_note"] = $request_data["note"];
        if ($this->model('ItemSelectedModel')->update($data,$id) > 0){
            echo json_encode(["response"=>"success"]);
        }else{
            echo json_encode(["response"=>"failed"]);
        }
    }
}