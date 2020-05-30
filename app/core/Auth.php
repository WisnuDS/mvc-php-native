<?php

spl_autoload_register(function ($class_name) {
    include '../app/models/'.$class_name . '.php';
});

class Auth
{
    
    public static function setTokenAuth()
    {
        if (function_exists('mcrypt_create_iv')) {
            $_SESSION['auth'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            $_SESSION['auth'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
        return $_SESSION['auth'];
    }

    public static function tokenValidation()
    {
        $user = new UserModel();
        if (isset($_SESSION['auth'])){
            $token = $user->findData("token",$_SESSION['auth'])['token'];
            if (hash_equals($_SESSION['auth'], $token)) {
                return true;
            } else {
                header("Location:".BASE_URL."authentication");
                exit();
            }
        }else{
            header("Location:".BASE_URL."authentication");
            exit();
        }
    }

    public static function loginTokenValidation()
    {
        $user = new UserModel();
        if (isset($_SESSION['auth'])){
            $token = $user->findData("token",$_SESSION['auth'])['token'];
            if (hash_equals($_SESSION['auth'], $token)) {
                header("Location:".BASE_URL);
                exit();}
        }
    }

    public static function clearToken()
    {
        $user = new UserModel();
        $id = $user->findData("token",$_SESSION['auth'])["id"];
        $data["token"] = null;
        if ($user->update($data,$id)>0){
            unset($_SESSION["auth"]);
            session_destroy();
        }
    }
}