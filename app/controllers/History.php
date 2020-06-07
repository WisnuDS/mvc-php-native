<?php


class History extends Controller
{
    public function index()
    {
        Auth::tokenValidation();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data=[
            "user" => $user,
            "title" => "History",
            "vue" => "history",
        ];
        $main["user"] = $user;
        $transactions = $this->model('ItemSelectedModel')->manualQuery("SELECT transactions_id FROM item_selected WHERE user_id = ".$user["id"]." && status = 'checkout' GROUP BY transactions_id");
        $main["transactions"] = [];
        foreach ($transactions as $transaction){
            $temp = $this->model('TransactionModel')->findDataById($transaction['transactions_id']);
            $temp["detail_driver"] = $this->model('DriverModel')->findDataById((int)$temp['driver_id']);
            $temp["detail_items"] = $this->model('ItemSelectedModel')->manualQuery("SELECT * FROM item_selected JOIN items ON item_selected.item_id = items.id WHERE transactions_id = ".$temp["id"]);
            $temp["detail_subdistrict"] = $this->model('SubDistrictModel')->findDataById((int)$temp["subdistrict"]);
            $total = 0;
            foreach ($temp["detail_items"] as $item){
                $total += $item["price"]*$item["quantity"];
            }
            $temp["subtotal"] = $total;
            if ($temp['status']==='Done'){
                $temp['color'] = 'green';
            }elseif ($temp['status']==='process'){
                $temp['color'] = 'yellow';
            }else{
                $temp['color'] = 'red';
            }
            array_push($main["transactions"],$temp);
        }
        $this->view('core/header',$data);
        $this->view('history',$main);
        $this->view('core/footer');
    }

    public function getDetailDriver($id)
    {
        echo json_encode($this->model('DriverModel')->findDataById($id));
    }
}