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

    public function selectOne($table,$col,$val)
    {
        $statement = ($this->pdo)->prepare("select * from $table where $col='$val'");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function insert($dataArr,$table)
    {
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

    public function delete($table,$id)
    {
        $statement = ($this->pdo)->prepare("delete from $table where id = ?");
        $statement->execute([$id]);
    }

    public function update($dataArr,$table,$id)
    {
        $getDataKeys = array_keys($dataArr);
        $arr = [];
        foreach ($getDataKeys as $key => $value) {
            array_push($arr,$value."=:".$value);
//            name=:name, surname=:surname, sex=:sex
        }
        $namedPlaceholder = implode(',',$arr);
        $sql = "update $table set $namedPlaceholder where id=:id";
        $statement = ($this->pdo)->prepare($sql);
        $arrMerge = array_merge($dataArr,['id'=>$id]);
        $statement->execute($arrMerge);
    }

    public function last($table)
    {
        $statement = ($this->pdo)->prepare("select * from $table order by id desc limit 1");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }
}