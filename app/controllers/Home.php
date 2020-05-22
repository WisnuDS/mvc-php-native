<?php

class Home extends Controller
{
    public function index(){
        $data['title'] = "Home";
        $data['user'] = $this->model('UserModel')->getAllData();
        $this->view("home/index",$data);
    }

    public function find($key,$value){
        $data['title'] = "Home";
        $data['user'] = $this->model('UserModel')->searchData($key,$value);
        $this->view("home/index",$data);
    }

    public function add($name,$age,$origin){
        $data['nama'] = $name;
        $data['usia'] = $age;
        $data['asal'] = $origin;
        if ($this->model('UserModel')->insert($data) > 0){
            FlashMessage::setFlasher("Data Berhasil Ditambah","Sukses","success");
            header("Location:".BASE_URL);
            exit();
        }else{
            FlashMessage::setFlasher("Data Gagal Ditambah","Gagal","danger");
            header("Location:".BASE_URL);
            exit();
        }
    }

    public function delete($id)
    {
        if ($this->model('UserModel')->delete($id) > 0){
            FlashMessage::setFlasher("Data Berhasil Dihapus","Sukses","success");
            header("Location:".BASE_URL);
            exit();
        }else{
            FlashMessage::setFlasher("Data Gagal Dihapus","Gagal","danger");
            header("Location:".BASE_URL);
            exit();
        }
    }

    public function update($id,$name,$age,$origin){
        $data['nama'] = $name;
        $data['usia'] = $age;
        $data['asal'] = $origin;
        $data['id'] = $id;
        if ($this->model('UserModel')->update($data) > 0){
            FlashMessage::setFlasher("Data Berhasil Ditambah","Sukses","success");
            header("Location:".BASE_URL);
            exit();
        }else{
            FlashMessage::setFlasher("Data Gagal Ditambah","Gagal","danger");
            header("Location:".BASE_URL);
            exit();
        }
    }
}