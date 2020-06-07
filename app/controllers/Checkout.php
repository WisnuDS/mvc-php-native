<?php


class Checkout extends Controller
{
    public function index()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "Checkout",
            "vue" => "checkout",
        ];
        $this->view('core/header',$data);
        $this->view('checkout',$data);
        $this->view('core/footer',$data);
    }

    public function invoice()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $query = "SELECT i.*,it.* FROM item_selected it JOIN items i ON it.item_id = i.id WHERE user_id = ".$user['id']." && status = 'cart'";
        $carts = $this->model('ItemSelectedModel')->manualQuery($query);
        $transactionId = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $data=[
                "transaction_date" => date("Y-m-d"),
                "driver_id" => 1,
                "order_note" => null,
                "rate" => null,
                "status" => "process",
                "address" => $_POST["address"],
                "subdistrict" => $_POST["selectHidden"],
                "zip" => $_POST["zip"],
                "telephone" => $_POST["phone"]
            ];
            $response = $this->model('TransactionModel')->getLastInsertId($data);
            if (isset($response)){
                if ($response['row']>0){
                    $transactionId = $response['id'];
                    $sum = 0;
                    foreach ($carts as $cart){
                        $dataUpdate["transactions_id"] = $transactionId;
                        $dataUpdate["status"] = "checkout";
                        $this->model('ItemSelectedModel')->update($dataUpdate,$cart['id']);
                        $sum+= $cart["quantity"]*$cart["price"];
                    }
                    $data["item"] = $carts;
                    $data["user"] = $user;
                    $query = "SELECT t.id,s.price,d.name FROM transactions t JOIN subdistrict s ON s.id=t.subdistrict JOIN drivers d on t.driver_id = d.id WHERE t.id = ".$transactionId;
                    $data["transaction"] = $this->model('TransactionModel')->manualQuery($query);
                    $data["total"] = $sum;
                    $data['subdistrict_name'] = $this->model('SubDistrictModel')->findDataById($data['subdistrict']);
                    $this->view('invoice',$data);
                }
            }
        }
        else{
            header("Location:".BASE_URL."History");
            exit();
        }
    }

    public function invoiceHistory($id)
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data = $this->model('TransactionModel')->findDataById($id);
        $carts = $this->model('ItemSelectedModel')->getSomeDataHistory($id);
        $data["item"] = $carts;
        $sum = 0;
        foreach ($carts as $cart){
            $sum+= $cart['price']*$cart['quantity'];
        }
        $data["user"] = $user;
        $query = "SELECT t.id,s.price,d.name FROM transactions t JOIN subdistrict s ON s.id=t.subdistrict JOIN drivers d on t.driver_id = d.id WHERE t.id = ".$id;
        $data["transaction"] = $this->model('TransactionModel')->manualQuery($query);
        $data["total"] = $sum;
        $data['subdistrict_name'] = $this->model('SubDistrictModel')->findDataById($data['subdistrict']);
        $this->view('invoice',$data);
    }

    public function getUser()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        echo json_encode($user);
    }

    public function getSubDistrict()
    {
        Auth::tokenValidation();
        echo json_encode($this->model('SubDistrictModel')->getAllData());
    }
}