<?php

namespace Controllers;


class BlogController extends Controller
{
    public function index() {

        echo $this->twig->render('blog/blog.html.twig');
    }
}