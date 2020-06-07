<?php


class __Admin extends Controller
{
    public function index()
    {
        Auth::tokenValidationAdmin();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $this->view('admin/core/nav',$user);
        $this->view('admin/core/footer');
    }

    public function login()
    {
        Auth::loginTokenValidationAdmin();
        $this->view('admin/login');
    }

    public function authenticate()
    {
        $username = $_POST["username"];
        $password = $_POST["pass"];
        if (strstr($username, "'")) {
            str_replace("'", "", $username);
        } elseif (strstr($username, "#")) {
            str_replace("#", "", $username);
        } elseif (strstr($password, "'")) {
            str_replace("'", "", $password);
        } elseif (strstr($password, "#")) {
            str_replace("#", "", $password);
        }
        $user = $this->model('UserModel')->findData("username", $username);
        var_dump($user);
        if (!empty($user)) {
            if ($user['role_id'] === '1') {
                if (password_verify($password, $user["password"])) {
                    $data["token"] = Auth::setTokenAuth();
                    $this->model('UserModel')->update($data, $user["id"]);
                    header("Location:" . BASE_URL."__Admin");
                    exit();
                } else {
                    FlashMessage::setFlasher("Password anda salah", "Authentication Gagal", "danger");
                    header("Location:" . BASE_URL . "__Admin/login");
                    exit();
                }
            } else {
                FlashMessage::setFlasher("Anda Bukan Admin yaa", "Authentication Gagal", "danger");
                header("Location:" . BASE_URL . "__Admin/login");
                exit();
            }
        } else {
            FlashMessage::setFlasher("Username anda salah", "Authentication Gagal", "danger");
            header("Location:" . BASE_URL . "__Admin/login");
            exit();
        }
    }

    public function logout()
    {
        Auth::clearToken();
        header("Location:".BASE_URL."__Admin/login");
        exit();
    }

    public function orders($status)
    {
        Auth::tokenValidationAdmin();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $transactions = $this->model('ItemSelectedModel')->manualQuery("SELECT transactions_id, user_id FROM item_selected WHERE status = 'checkout' GROUP BY transactions_id,user_id");
        $main["transactions"] = [];
        foreach ($transactions as $transaction){
            $temp = $this->model('TransactionModel')->findDataById($transaction['transactions_id']);
            if ($temp['status']===$status || $status==='all'){
                $temp["detail_user"] = $this->model('UserModel')->findDataById($transaction['user_id']);
                $temp["detail_driver"] = $this->model('DriverModel')->findDataById((int)$temp['driver_id']);
                $temp["detail_items"] = $this->model('ItemSelectedModel')->manualQuery("SELECT * FROM item_selected JOIN items ON item_selected.item_id = items.id WHERE transactions_id = ".$temp["id"]);
                $temp["detail_subdistrict"] = $this->model('SubDistrictModel')->findDataById((int)$temp["subdistrict"]);
                $total = 0;
                foreach ($temp["detail_items"] as $item){
                    $total += $item["price"]*$item["quantity"];
                }
                $temp["subtotal"] = $total;
                if ($temp['status']==='Done'){
                    $temp['color'] = 'success';
                }elseif ($temp['status']==='process'){
                    $temp['color'] = 'warning';
                }else{
                    $temp['color'] = 'danger';
                }
                array_push($main["transactions"],$temp);
            }
        }
        $this->view('admin/core/nav',$user);
        $this->view('admin/order',$main);
        $this->view('admin/core/footer');
    }

    public function detailOrder($id)
    {
        Auth::tokenValidationAdmin();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        $data['driver'] = $this->model('DriverModel')->getSomeData("WHERE status = 'active'");
        $data['item'] = $this->model('ItemSelectedModel')->getSomeDataHistory($id);
        $data['id'] = $id;
        $this->view('admin/core/nav',$user);
        $this->view('admin/detail_order',$data);
        $this->view('admin/core/footer');
    }

    public function updateDriver($idTransaction)
    {
        $data['driver_id'] = $_POST['driver'];
        if ($this->model('TransactionModel')->update($data,$idTransaction) > 0){
            header("Location:".BASE_URL."__Admin/orders/all");
            exit();
        }else{
            header("Location:".BASE_URL."__Admin/orders/all");
            exit();
        }
    }

    public function user($role)
    {
        Auth::tokenValidationAdmin();
        $user = $this->model('UserModel')->findData("token",$_SESSION['auth']);
        if ($role==='3'){
            $data['user'] = $this->model('DriverModel')->getAllData();
        }else{
            $data['user'] = $this->model('UserModel')->getSomeData('JOIN subdistrict s ON subdistrict_id = s.id WHERE role_id = '.$role);
        }
        $data['id'] = $role;
        $this->view('admin/core/nav',$user);
        $this->view('admin/users',$data);
        $this->view('admin/core/footer');
    }
}