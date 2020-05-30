<?php


class ItemSelectedModel extends Model
{

    protected function table()
    {
        return "item_selected";
    }

    protected function columns()
    {
        return ["transactions_id","item_id","user_id","quantity","status","item_note"];
    }
}