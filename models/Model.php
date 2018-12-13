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

    /**
     * @param $table
     * @return array
     *
     * get all data from the selected table
     */
    public function getAll($table) {
        $req = $this->db->prepare('SELECT * FROM ' .$table);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $table
     * @param $id
     * @return bool
     *
     * delete a row from the database based on the selected table and id
     */
    public function delete($table, $id) {
        $req = $this->db->prepare('DELETE FROM ' . $table . ' WHERE id = :id LIMIT 1');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }
}