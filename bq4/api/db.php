<?php
date_default_timezone_set("asia/taipei");
session_start();

class DB
{
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db24";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    private function a2s($array)
    {
        foreach ($array as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }

    private function sql_all($sql, $array = "", $other = "")
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
    function find($id)
    {
        $sql = "select * from `$this->table`";

        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where" . join("&&", $tmp);
        } else {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from `$this->table`";

        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= " where" . join("&&", $tmp);
        } else {
            $sql .= " where `id`='$id'";
        }
        return $this->pdo->exec($sql);
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql .= join(",", $tmp);
            $sql .= " where `id` ='{$array['id']}'";
        } else {
            $sql = "insert into  `$this->table`";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", $array) . "')";
            $sql = $sql . $cols . " values" . $vals;
        }
        return $this->pdo->exec($sql);
    }
    private function math($math,$col,$array="",$other="")
    {
        $sql="select $math($col) from `$this->table`";
        $sql=$this->sql_all($sql,$array,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col="",$array="",$other="")
    {
        return $this->math('sum',$col="",$array="",$other="");
    }
    function max($col="",$array="",$other="")
    {
        return $this->math('max',$col="",$array="",$other="");
    }
    function min($col="",$array="",$other="")
    {
        return $this->math('min',$col="",$array="",$other="");
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

$Bottom=new DB('bottom');
$Mem=new DB('mem');
$Admin=new DB('admin');
$Type=new DB('type');
$Goods=new DB('goods');