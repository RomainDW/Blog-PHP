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

    public function delete($table, $id) {
        $req = $this->db->prepare('DELETE FROM ' . $table . ' WHERE id = :id LIMIT 1');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }
}