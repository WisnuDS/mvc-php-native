<?php


class UserModel extends Model
{

    protected function table()
    {
        return "user";
    }

    protected function columns()
    {
        return array("nama","usia","asal");
    }
}