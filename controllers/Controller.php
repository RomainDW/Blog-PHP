<?php

namespace Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;
use Models\Model;

class Controller
{
    protected $twig;
    protected $model;

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

        // Blog model
        $this->model = new Model;
    }

    function redirect404() {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}