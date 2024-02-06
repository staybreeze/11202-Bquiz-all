<?php
date_default_timezone_set("Asia/Taipe");
session_start();
class DB
{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=123";
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
            $tmp[] = "`$col`='$val";
        }
        return $tmp;
    }
    function sql_all($sql, $array, $other)
    {
        if (isset($this->table) && !empty($this->table)) {
            if (is_array($array)) {
                $tmp = $this->a2s($array);
                $sql .= "where" . join("&&", $tmp);
            } elseif (is_numeric($array)) {

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
    function all($array = '', $other = '')
    {
        $sql = "select * from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($array = '', $other = '')
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
            $sql .= "where" . join("&&", $tmp);
        } elseif (is_numeric($id)) {

            $sql .= "where `id`='$id'";
        }

        return $this->pdo->query($sql)->fetchColumn();
    }

    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table`";
            if (!empty($array)) {
                $tmp = $this->a2s($array);
            }
            $sql = "where" . join("&&", $tmp);
        } else {
            $sql = "insert into `$this->table`";
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            $vals = "('" . join("','", ($array)) . "')";
            $sql = $sql . $cols . "values" . $vals;
        }
        return $this->pdo->exec($sql);
    }
    function del($id)
    {
        $sql = "delete * from `$this->table`";
        if (is_array($id)) {
            $tmp = $this->a2s($id);
            $sql .= "where" . join("&&", $tmp);
        } elseif (is_numeric($id)) {

            $sql .= "where `id`='$id'";
        }

        return $this->pdo->exec($sql);
    }

    private function math($math, $col, $array = '', $other = '')
    {
        $sql = "select $math($col) from `$this->table`";
        $sql = $this->sql_all($sql, $array, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function sum($col = '', $array = '', $other = '')
    {
        return $this->math('sum', $col, $array, $other);
    }
    function max($col = '', $array = '', $other = '')
    {
        return $this->math('max', $col, $array, $other);
    }
    function min($col = '', $array = '', $other = '')
    {
        return $this->math('min', $col, $array, $other);
    }
}
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}

if (!isset($_SESSION['visited'])) {
    if ($Total->count(['date' => date('y-m-d')] > 0)) {
        $total = $Total->find(['date' => date('y-m-d')]);
        $total['total']++;
        $Total->save($total);
    } else {
        $Total->save(
            [
                'total' => 1,
                'date' => date('y-m-d')
            ]

        );
    }
    $_SESSION['visited'] = 1;
}
