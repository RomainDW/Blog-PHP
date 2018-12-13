<?php

namespace Models;


class Users extends Model
{
    public function getUser($email, $password) {

        $data = [
            'email'     => $email,
            'password'  => sha1($password)
        ];

        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $req->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $req->execute();

        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public function checkUserByEmail ($email) {
        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $req->bindValue(':email', $email, \PDO::PARAM_STR);
        $req->execute();
        return $req->rowCount();
    }

    public function setUser($data) {
        $req = $this->db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
        $req->bindValue(':name', $data['name'], \PDO::PARAM_STR);
        $req->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $req->bindValue(':role', $data['role'], \PDO::PARAM_BOOL);
        return $req->execute();
    }
}