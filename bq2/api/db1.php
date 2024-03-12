<?php
date_default_timezone_set("aisa/taipei");
session_start();

class DB
{

    protected $dsn = "";
    protected $table;
    protected $pdo;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }

    function a2s($array)
    {
        foreach ($array as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }
    function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                $tmp = $this->a2s($array);
            } elseif (is_numeric($array)) {
                $sql .= "$array";
            }
            $sql.=$other;
            return $sql;
        }
    }

    function all()
    {
    }
    function count()
    {
    }
    function find()
    {
    }
    function save()
    {
    }
    function del()
    {
    }

    function math()
    {
    }
    function sum()
    {
    }
    function max()
    {
    }
    function min()
    {
    }
}

function dd()
{
}
function to()
{
}
