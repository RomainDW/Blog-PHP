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

    /**
     * @param $table
     * @param $id
     * @return mixed
     *
     * get all data based on the selected table and id
     */
    public function getById ($table, $id) {
        $req = $this->db->prepare('SELECT * FROM ' . $table . ' WHERE id = :id LIMIT 1');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return mixed
     *
     * Get the config
     */
    public function getConfig() {
        $req = $this->db->prepare('SELECT * FROM config WHERE id = 1');
        $req->execute();
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $ppp
     * @param int $cpc
     * @return bool
     *
     * Update the config
     */
    public function updateConfig(int $ppp, int $cpc) {
        $req = $this->db->prepare("UPDATE config SET ppp = :ppp, characters = :cpc WHERE id = 1");
        $req->bindValue(':ppp', $ppp, \PDO::PARAM_INT);
        $req->bindValue(':cpc', $cpc, \PDO::PARAM_INT);
        return $req->execute();
    }
}