<?php


class TransactionModel extends Model
{

    protected function table()
    {
        return "transactions";
    }

    protected function columns()
    {
        return ["driver_id","transaction_date","order_note","rate","status","address","subdistrict","zip","telephone"];
    }
}