<?php

class  QueryBuilder
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table,$col='id',$order='desc')
    {
        $statement = ($this->pdo)->prepare("select * from $table order by $col $order");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectOne($table,$key,$value)
    {
        $statement = ($this->pdo)->prepare("select * from $table where $key='$value'");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert($dataArr,$table){

//         dd(array_keys($dataArr)[0]);
        $getDataKeys = array_keys($dataArr);
        $cols = implode(",",$getDataKeys);
        $questionMark = "";
        foreach ($getDataKeys as $key => $value) {
            $questionMark .= "?,";
        }
        $questionMark = rtrim($questionMark,",");
        $sql = "insert into $table ($cols) values($questionMark)";
  
        $statement = ($this->pdo)->prepare($sql);
        $getDataValues = array_values($dataArr);
        $statement->execute($getDataValues);
    }
}