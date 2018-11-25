<?php

namespace Controllers;


class BlogController extends Controller
{
    public function index() {

        $posts = $this->model->getAll('posts');

        echo $this->twig->render('front/blog/blog.html.twig', [
            'posts' => $posts
        ]);
    }
}