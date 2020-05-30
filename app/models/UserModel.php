<?php


class UserModel extends Model
{

    protected function table()
    {
        return "users";
    }

    protected function columns()
    {
        return array("username","password","token","role_id","email","address","subdistrict","zip","telephone","avatar","full_name");
    }
}