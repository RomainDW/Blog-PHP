<?php

namespace Models;

use Engine\Db;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function getAll($table) {
        $req = $this->db->prepare('SELECT * FROM ' .$table);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}