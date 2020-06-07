<?php


class SubDistrictModel extends Model
{

    protected function table()
    {
        return "subdistrict";
    }

    protected function columns()
    {
        return ["name","price"];
    }
}