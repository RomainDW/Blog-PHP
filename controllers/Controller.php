<?php

namespace Controllers;

use Models\Users;
use \Twig_Loader_Filesystem;
use \Twig_Environment;
use Models\Model;
use Models\Blog;

class Controller
{
    protected $twig;
    protected $model;
    protected $blogModel;
    protected $usersModel;

    function __construct()
    {
        $className = substr(get_class($this), 12, -10);
        // Twig Configuration
        $loader = new Twig_Loader_Filesystem('./views/');
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true,
        ));
        $this->twig->addExtension(new \Twig_Extension_Debug());
        $this->twig->addGlobal('_get', $_GET);

        // Models
        $this->model = new Model;
        $this->blogModel = new Blog;
        $this->usersModel = new Users;

        //SESSION
        if (empty($_SESSION))
            session_start();
    }

    protected function redirect404() {
        header('This is not the page you are looking for', true, 404);
        include('views/404.html');
        exit();
    }

    protected function removeImage($image, $path) {
        if ($image != null) {
            if (file_exists($path . $image)){
                unlink($path . $image);
            }
        }
    }

    protected function isAdmin() {

        if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function isUser() {

        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    protected function isLogged() {

        if ($this->isAdmin()) {

            return true;

        } elseif ($this->isUser()) {

            return true;

        } else {

            return false;
        }
    }
}