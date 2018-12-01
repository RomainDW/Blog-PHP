<?php


namespace Controllers;


class DashboardController extends Controller
{
    public function index() {

        $posts = $this->model->getAll('posts');

        echo $this->twig->render('admin/dashboard/dashboard.html.twig', [
            'posts' => $posts
        ]);

    }
}