<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 14/12/18
 * Time: 14:14
 */

namespace Models;


class Comments extends Model
{
    /**
     * @param $data
     * @return bool
     *
     * Insert comment, return true if it works
     */
    public function setComment($data) {
        $req = $this->db->prepare('INSERT INTO comments (id_user, id_post, content) VALUES (:id_user, :id_post, :content)');
        $req->bindValue(':id_user', $data['id_user'], \PDO::PARAM_INT);
        $req->bindValue(':id_post', $data['id_post'], \PDO::PARAM_INT);
        $req->bindValue(':content', $data['content'], \PDO::PARAM_STR);
        return $req->execute();
    }

    /**
     * @param $id
     * @return array
     *
     * Get all verified comments + user information
     */
    public function getVerifiedCommentsByPostId($id) {
        $req = $this->db->prepare('SELECT * FROM comments INNER JOIN users ON comments.id_user = users.id WHERE verified = 1 and id_post = :id_post');
        $req->bindValue(':id_post', $id, \PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}