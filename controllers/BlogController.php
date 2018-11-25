<?php

namespace Controllers;


use Models\Blog;

class BlogController extends Controller
{
    protected $blogModel;

    public function __construct()
    {
        parent::__construct();
        $this->blogModel = new Blog;
    }

    public function index() {

        $posts = $this->model->getAll('posts');

        echo $this->twig->render('front/blog/blog.html.twig', [
            'posts' => $posts
        ]);
    }

    public function create() {

        $message = [
            'success'   => null,
            'error'     => null
        ];

        if (isset($_POST['title']) AND isset($_POST['subtitle']) AND isset($_POST['content']) ) {

            if ($_POST['active'] == null) {
                $_POST['active'] = 0;
            }

            if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {

                if ($_FILES['image']['size'] <= 1000000) {

                    $infoImage = pathinfo($_FILES['image']['name']);
                    $imageExtension = $infoImage['extension'];
                    $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');

                    if (in_array($imageExtension, $allowedExtensions)) {
                        move_uploaded_file($_FILES['image']['tmp_name'],  'uploads/' . basename($_FILES['image']['name']));
                    }
                }

                $image = basename($_FILES['image']['name']);
            } else {
                $image = null;
            }

            $data = [
                'title'         => $_POST['title'],
                'subtitle'      => $_POST['subtitle'],
                'content'       => $_POST['content'],
                'image'         => $image,
                'active'        => $_POST['active']
            ];

            if ($this->blogModel->setPost($data)) {
                $message['success'] = 'L\'article a bien été ajouté !';
            }
        }

        echo $this->twig->render('admin/blog/create.html.twig', [
            'message'   => $message,
        ]);
    }
}