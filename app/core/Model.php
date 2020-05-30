<?php


abstract class Model
{
    protected abstract function table();
    protected abstract function columns();
    private $connection;

    public function __construct()
    {
        $this->connection = new Database();
    }

    public function getAllData(){
        $this->connection->query("SELECT * FROM ".$this->table());
        return $this->connection->resultSet();
    }

    public function getSomeData($params){
        $query = "SELECT * FROM ".$this->table()." ".$params;
        $this->connection->query($query);
        return $this->connection->resultSet();
    }

    public function findDataById($id){
        $this->connection->query("SELECT * FROM ".$this->table()." WHERE id = :id");
        $this->connection->bind("id",$id);
        return $this->connection->singleSet();
    }

    public function findData($key, $value){
        $this->connection->query("SELECT * FROM ".$this->table()." WHERE $key = :value");
        $this->connection->bind("value",$value);
        return $this->connection->singleSet();
    }

    public function searchData($key, $value){
        $this->connection->query("SELECT * FROM ".$this->table()." WHERE $key LIKE :value");
        $this->connection->bind("value","%".$value."%");
        return $this->connection->resultSet();
    }

    public function insert($data){
        $stringColumn = "(";
        foreach ($this->columns() as $column){
            $stringColumn.=$column.",";
        }
        $stringColumn = substr($stringColumn,0,-1).")";
        $query = "INSERT INTO ".$this->table()." ".$stringColumn." VALUE(";
        foreach ($this->columns() as $column){
            $query .= ":".$column.",";
        }
        $fixQuery = substr($query,0,-1).")";
        $this->connection->query($fixQuery);
        foreach ($this->columns() as $column){
            $this->connection->bind($column, $data[$column]);
        }
        $this->connection->execute();
        return $this->connection->rowCount();
    }

    public function delete($id)
    {
        $query = "DELETE FROM ".$this->table()." WHERE id = :id";
        $this->connection->query($query);
        $this->connection->bind('id',$id);
        $this->connection->execute();
        return $this->connection->rowCount();
    }

    public function update($data,$id){
        $query = "UPDATE ".$this->table()." SET ";
        foreach ($data as $column => $value){
            $query .= $column."=:".$column.",";
        }
        $fixQuery = substr($query,0,-1);
        $fixQuery .= " WHERE id = :id";
        $this->connection->query($fixQuery);
        foreach ($data as $column => $value){
            $this->connection->bind($column, $value);
        }
        $this->connection->bind('id',$id);
        $this->connection->execute();
        return $this->connection->rowCount();
    }

}