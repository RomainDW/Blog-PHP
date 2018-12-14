<?php


namespace Models;


class Blog extends Model
{
    /**
     * @param $data
     * @return bool
     *
     * Create a blog post, return true if no errors
     */
    public function setPost($data) {
        $req = $this->db->prepare('
            INSERT INTO posts (title, subtitle, content, date_add, image, active) 
            VALUES (:title, :subtitle, :content, NOW(), :image, :active)');

        $req->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $req->bindValue(':subtitle', $data['subtitle'], \PDO::PARAM_STR);
        $req->bindValue(':content', $data['content'], \PDO::PARAM_LOB);
        $req->bindValue(':image', $data['image'], \PDO::PARAM_STR);
        $req->bindValue(':active', $data['active'], \PDO::PARAM_BOOL);

        return $req->execute();
    }

    /**
     * @param $id
     * @return mixed
     *
     * Retrieve data from a blog post based on its ID
     */
    public function getPostById($id) {
        $req = $this->db->prepare('SELECT * from posts WHERE id = ' . $id);
        $req->execute();
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $data
     * @param $postId
     * @return bool
     *
     * Update blog post's data based on its ID
     */
    public function updatePost($data, $postId) {
        $req = $this->db->prepare('UPDATE posts SET title = :title, subtitle = :subtitle, content = :content, image = :image, active = :active, date_update = NOW() WHERE id = :id LIMIT 1');
        $req->bindValue(':id', $postId, \PDO::PARAM_INT);
        $req->bindValue(':title', $data['title'], \PDO::PARAM_STR);
        $req->bindValue(':subtitle', $data['subtitle'], \PDO::PARAM_STR);
        $req->bindValue(':content', $data['content'], \PDO::PARAM_LOB);
        $req->bindValue(':image', $data['image'], \PDO::PARAM_STR);
        $req->bindValue(':active', $data['active'], \PDO::PARAM_BOOL);
        return $req->execute();
    }

    /**
     * @return mixed
     *
     * Get total number of blog posts
     */
    public function getNumberOfPosts() {
        $req = $this->db->prepare('SELECT COUNT(*) FROM posts WHERE active = 1');
        $req->execute();
        return $req->fetchColumn();

    }

    /**
     * @param $this_page_first_result
     * @param $results_per_page
     * @return array
     *
     * Get blog posts based on pagination
     */
    public function getPostsPagination($this_page_first_result, $results_per_page) {
        $req = $this->db->prepare('SELECT * FROM posts LIMIT ' . $this_page_first_result . ',' .  $results_per_page);
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}