<?php

namespace Models;


class Users extends Model
{
    public function getUser($email, $password) {

        $data = [
            'email'     => $email,
            'password'  => $password
        ];

        $req = $this->db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $req->bindValue(':email', $data['email'], \PDO::PARAM_STR);
        $req->bindValue(':password', $data['password'], \PDO::PARAM_STR);
        $req->execute();

        return $req->fetch(\PDO::FETCH_ASSOC);
    }
}