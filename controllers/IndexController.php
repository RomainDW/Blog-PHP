<?php

namespace Controllers;

use Models\Blog;

class IndexController
{

    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new Blog;
    }

    public function index() {


    }

}