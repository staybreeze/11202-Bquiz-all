<?php
date_default_timezone_set("asia/taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db12";
    protected  $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, "root", "");
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
            $sql .= " where `id` ='$array'";
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
            $sql .= " where `id` ='$array'";
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

    private function  math($math, $col, $array='', $other='')
    {

        
            $sql = "select $math($col) from `$this->table`";
            $sql = $this->sql_all($sql, $array, $other);
            return $this->pdo->query($sql)->fetchColumn();
        
    }

    function sum($col = '', $array = '', $other = '')
    {
       return  $this->math('sum', $col, $array, $other);
    }

    function max($col = "", $array = "", $other = "")
    {
        return $this->math('max', $col, $array, $other);
    }

    function min($col = "", $array = "", $other = "")
    {
        return $this->math('min', $col, $array, $other);
    }
}


function to($url)
{
    header("location:$url");
}

function dd($id)
{
    echo "<pre>";
    print_r($id);
    echo "</pre>";
}

$User = new DB('user');
$News = new DB('news');
$Que = new DB('que');
$Log = new DB('log');
$Total = new DB('total');

// CREATE TABLE `db12`.`user` 
// (`id` INT UNSIGNED NULL AUTO_INCREMENT ,
//  `acc` TEXT NOT NULL ,
//   `pw` TEXT NOT NULL 
//  , `email` TEXT NOT NULL ,
//   PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `db12`.`total` 
// (`id` INT UNSIGNED NULL AUTO_INCREMENT ,
//  `total` TEXT NOT NULL ,
//   `date` DATE NOT NULL 
//  , 
//   PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `db12`.`news` 
// (`id` INT UNSIGNED NULL AUTO_INCREMENT ,
//  `text` TEXT NOT NULL ,
//   `news` TEXT NOT NULL 
//  , 
//  `sh` INT NOT NULL ,
//  `type` INT NOT NULL ,
//  `good` INT NOT NULL ,
//   PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `db12`.`que` 
// (`id` INT UNSIGNED NULL AUTO_INCREMENT ,
//  `text` TEXT NOT NULL ,
//   `subject_id` INT NOT NULL 
//   `vote` INT NOT NULL 
//  , 
//   PRIMARY KEY (`id`)) ENGINE = InnoDB;

// CREATE TABLE `db12`.`log` 
// (`id` INT UNSIGNED NULL AUTO_INCREMENT ,
//  `news` INT NOT NULL ,
//   `vote` INT NOT NULL 
//  , 
//   PRIMARY KEY (`id`)) ENGINE = InnoDB;

if (!isset($_SESSION['visited'])) {
    if (($Total->count(['date' => date("Y-m-d")])) > 0) {
        $row = $Total->find(['date' => date("Y-m-d")]);
        $row['total']++;
        $Total->save($row);
    } else {
        $Total->save([
            'date' => date("Y-m-d"),
            'total' => 1
        ]);
    }
    $_SESSION['visited']=1;
}
