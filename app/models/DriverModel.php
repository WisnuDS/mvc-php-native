<?php


class DriverModel extends Model
{

    protected function table()
    {
        return "drivers";
    }

    protected function columns()
    {
        return ["name","status","join_at","whatsapp_number","photo","telegram_id"];
    }
}