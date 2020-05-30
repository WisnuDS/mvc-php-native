<?php


class ItemModel extends Model
{

    protected function table()
    {
        return "items";
    }

    protected function columns()
    {
        return ["id","item_name","item_description","price","unit","image"];
    }
}