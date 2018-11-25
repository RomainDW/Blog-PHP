<?php


namespace Models;


class Blog extends Model
{
    public function setPost($data) {
        $req = $this->db->prepare('
            INSERT INTO posts (title, subtitle, content, date_add, image, active) 
            VALUES (:title, :subtitle, :content, NOW(), :image, :active)');

        return $req->execute($data);
    }


}