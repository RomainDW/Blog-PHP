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

    public function updateRoleUser($value, $id) {
        $req = $this->db->prepare('UPDATE users SET role = :role WHERE id = :id');
        $req->bindValue(':role', $value, \PDO::PARAM_BOOL);
        $req->bindValue(':id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }
}