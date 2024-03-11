<?php
date_default_timezone_set("asia/taipei");
session_start();
class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db41";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, "root", "");
    }

    private function a2s($array)
    {
        foreach ($array as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }

    private function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {

                $tmp = $this->a2s($array);
                $sql .= " where" . join("&&", $tmp);
            } else {
                $sql .= "$array";
            }
            $sql .= $other;
            return $sql;
        }
    }

    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    function all($array = "", $other = "")
    {
        $sql = "select * from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($array = "", $other = "")
    {
        $sql = "select count(*) from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }

    function find($array)
    {
        $sql = "select * from `$this->table`";
        if (is_array($array)) {

            $tmp = $this->a2s($array);
            $sql .= " where" . join("&&", $tmp);
        } else {
            $sql .= " where `id`='$array'";;
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    function del($array)
    {
        $sql = "delete  from `$this->table`";
        if (is_array($array)) {

            $tmp = $this->a2s($array);
            $sql .= " where" . join("&&", $tmp);
        } else {
            $sql .= " where `id`='$array'";;
        }
        return $this->pdo->exec($sql);
    }

    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set";
            $tmp = $this->a2s($array);
            $sql .= join(",", $tmp);
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table`";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
            $sql = $sql . $cols . " values" . $vals;
        }
        return $this->pdo->exec($sql);
    }

    private function math($math,$col,$array="",$other=""){
        $sql = "select $math($col) from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchColumn();  
    }
    function sum($col="",$array="",$other=""){
        return $this->math('sum',$col,$array,$other);
    }
    function max($col="",$array="",$other=""){
        return $this->max('sum',$col,$array,$other);
    }
    function min($col="",$array="",$other=""){
        return $this->min('sum',$col,$array,$other);
    }
}


function dd($id){
    echo "<pre>";
    print_r($id);
    echo "</pre>";
}

function to($url){
    header("location:$url");
}

$Title=new DB('title');
$Mvim=new DB('mvim');
$Image=new DB('image');
$Menu=new DB('menu');

$News=new DB('news');
$Ad=new DB('ad');
$Admin=new DB('admin');

$Bottom=new DB('bottom');
$Total=new DB('total');

// CREATE TABLE `db41`.`title` (
//     `id` INT UNSIGNED NULL AUTO_INCREMENT ,
//      `text` TEXT NOT NULL ,
//       `sh` TEXT NOT NULL ,
//        `img` TEXT NOT NULL ,
//         PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `db41`.`mvim` (
//     `id` INT UNSIGNED NULL AUTO_INCREMENT ,
    
//       `sh` TEXT NOT NULL ,
//        `img` TEXT NOT NULL ,
//         PRIMARY KEY (`id`)) ENGINE = InnoDB;