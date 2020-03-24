<?php

namespace App\Core;

use mysqli;
class Model
{
    public $db;
    function __construct()
    {
        global $config;
        $this->db = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
    }

    public static function count($sql)
    {
        return mysqli_num_rows($sql);
    }

    public function fetch($sql)
    {
        return mysqli_fetch_assoc($sql);
    }
}

