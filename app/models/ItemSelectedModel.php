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

    public function getSomeData($id)
    {
        $params = "JOIN items ON item_selected.item_id = items.id WHERE user_id = ".$id." && status = 'cart'";
        return parent::getSomeData($params);
    }

    public function getSomeDataHistory($id)
    {
        $params = "JOIN items ON item_selected.item_id = items.id WHERE transactions_id = ".$id." && status = 'checkout'";
        return parent::getSomeData($params);
    }
}