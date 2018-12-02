<?php

namespace Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;
use Models\Model;
use Models\Blog;

class Controller
{
    protected $twig;
    protected $model;
    protected $blogModel;

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
    }

    function redirect404() {
        header('HTTP/1.0 404 Not Found');
        exit;
    }

    function removeImage($image, $path) {
        if ($image != null) {
            if (file_exists($path . $image)){
                unlink($path . $image);
            }
        }
    }
}