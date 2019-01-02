<?php

namespace Models;


class Users extends Model
{
    /**
     * @param $email
     * @param $password
     * @return mixed
     *
     * Get the user according to the selected email and password
     */
    public function getUser($email, $password) {

        $data = [
            'email'     => $email,
            'password'  => sha1($password) // encode the password
        ];

        $req = $this->db->prepare('SELECT name, id, role FROM users WHERE email = :email AND password = :password');
        $req->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $req->execute();

        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $email
     * @return int
     *
     * Check if the user exists according to the email
     */
    public function checkUserByEmail ($email) {
        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $req->bindValue(':email', $email, \PDO::PARAM_STR);
        $req->execute();
        return $req->rowCount();
    }

    /**
     * @param $data
     * @return bool
     *
     * Creates a user
     */
    public function setUser($data) {
        $req = $this->db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
        $req->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $req->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $req->bindValue(':role', $data['role'], \PDO::PARAM_BOOL);
        return $req->execute();
    }

    /**
     * @param $value
     * @param $id
     * @return bool
     *
     * update user's role
     */
    public function updateRoleUser($value, $id) {
        $req = $this->db->prepare('UPDATE users SET role = :role WHERE id = :id');
        $req->bindValue(':role', $value, \PDO::PARAM_BOOL);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }

    /**
     * @return array
     *
     * get all users
     */
    public function getAllUsers() {
        $req = $this->db->prepare('SELECT * FROM users');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @return mixed
     *
     * get user based on his id
     */
    public function getUserById ($id) {
        $req = $this->db->prepare('SELECT * FROM users WHERE id = :id LIMIT 1');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return bool
     *
     * delete a user
     */
    public function deleteUser(int $id) {
        $req = $this->db->prepare('DELETE FROM users WHERE id = :id LIMIT 1');
        $req->bindParam(':id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }
}