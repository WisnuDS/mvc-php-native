<?php


class Authentication extends Controller
{
    public function index()
    {
        Auth::loginTokenValidation();
        $this->view('login');
    }

    public function register()
    {
        Auth::loginTokenValidation();
        $this->view('register');
    }

    public function authenticate()
    {
        $username = $_POST["username"];
        $password = $_POST["pass"];
        if (strstr($username,"'")){
            str_replace("'","",$username);
        }elseif (strstr($username,"#")){
            str_replace("#","",$username);
        }elseif (strstr($password,"'")){
            str_replace("'","",$password);
        }elseif (strstr($password,"#")){
            str_replace("#","",$password);
        }
        $user = $this->model('UserModel')->findData("username",$username);
        if (!empty($user)){
            if (password_verify($password,$user["password"])){
                $data["token"] = Auth::setTokenAuth();
                $this->model('UserModel')->update($data,$user["id"]);
                header("Location:".BASE_URL);
                exit();
            }else{
                FlashMessage::setFlasher("Password anda salah","Authentication Gagal","danger");
                header("Location:".BASE_URL."authentication");
                exit();
            }
        }else{
            FlashMessage::setFlasher("Username anda salah","Authentication Gagal","danger");
            header("Location:".BASE_URL."authentication");
            exit();
        }
    }

    public function registrationAccount()
    {
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = password_hash($_POST["pass"],PASSWORD_BCRYPT);
        $email = $_POST["email"];
        $address= $_POST["address"];
        $subdistrict = $_POST["subdistrict"];
        $postal = $_POST["zip"];
        $telephone = $_POST["telephone"];
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/PasarTradisional/public/uploads/";
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $file_name = 'photo-'.substr(str_shuffle($permitted_chars), 0, 32).'.'.strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
        $target_file = $target_dir . 'photo-'.substr(str_shuffle($permitted_chars), 0, 32).'.'.strtolower(pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION));
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);

        if($check !== false) {
            $uploadOk = 1;
        } else {
            FlashMessage::setFlasher("File is not an image.","Failed Upload","danger");
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            FlashMessage::setFlasher("Sorry, file already exists.","Failed Upload","danger");
            $uploadOk = 0;
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            FlashMessage::setFlasher("Sorry, only JPG, JPEG, & PNG files are allowed.","Failed Upload","danger");
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            header("Location:".BASE_URL."authentication/register");
        } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                $data = [
                    "full_name" => $name,
                    "username" => $username,
                    "password" => $password,
                    "token" => null,
                    "role_id" => 2,
                    "email" => $email,
                    "address" => $address,
                    "subdistrict" => $subdistrict,
                    "zip" => $postal,
                    "telephone" => $telephone,
                    "avatar" => $file_name
                ];
                if ($this->model('UserModel')->insert($data) > 0){
                    FlashMessage::setFlasher("you have successfully registered","Congratulations","success");
                    header("Location:".BASE_URL."authentication");
                }else{
                    FlashMessage::setFlasher("Sorry, there was an error when register your account.","Failed","danger");
                    header("Location:".BASE_URL."authentication/register");
                }

            } else {
                FlashMessage::setFlasher("Sorry, there was an error uploading your file.","Failed Upload","danger");
                header("Location:".BASE_URL."authentication/register");
            }
        }
    }

    public function logout()
    {
        Auth::clearToken();
        header("Location:".BASE_URL."authentication");
        exit();
    }

    public function ajaxFindUsername($username)
    {
        $user = $this->model('UserModel')->findData("username",$username);
        if (empty($user)){
            $response=[
                "isAvailable" => true
            ];
        }else{
            $response=[
                "isAvailable" => false
            ];
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}