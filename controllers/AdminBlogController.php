<?php

namespace Controllers;


class AdminBlogController extends Controller
{
    public function index($success, $error) {

        $posts = $this->model->getAll('posts');

        $message = [
            'success'   => $success,
            'error'     => $error
        ];

        echo $this->twig->render('admin/blog/list.html.twig', [
            'posts'     => $posts,
            'message'   => $message,
        ]);

    }

    public function create() {

        $message = [
            'success'   => null,
            'error'     => null
        ];

        if (isset($_POST['title']) AND isset($_POST['subtitle']) AND isset($_POST['content']) ) {

            if (!isset($_POST['active'])) {
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
                } else {
                    $message['error'] = 'l\'image est trop lourde';
                }

                $image = basename($_FILES['image']['name']);
            } else {
                $image = null;
            }

            $content =  htmlspecialchars($_POST['content'], ENT_HTML5);

            $data = [
                'title'         => $_POST['title'],
                'subtitle'      => $_POST['subtitle'],
                'content'       => $content,
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

    public function edit() {
        if (isset($_GET['id'])) {

            $post = $this->blogModel->getPostById($_GET['id']);

            if ($post) {

                $message = [
                    'success'   => null,
                    'error'     => null
                ];

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    if (!isset($_POST['active'])) {
                        $_POST['active'] = 0;
                    }

                    if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {


                        if ($_FILES['image']['size'] <= 1000000) {

                            $infoImage = pathinfo($_FILES['image']['name']);
                            $imageExtension = $infoImage['extension'];
                            $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');

                            if (in_array($imageExtension, $allowedExtensions)) {

                                $this->removeImage($post['image'], 'uploads/');

                                move_uploaded_file($_FILES['image']['tmp_name'],  'uploads/' . basename($_FILES['image']['name']));
                            }
                            $image = basename($_FILES['image']['name']);
                        } else {
                            $message['error'] = 'L\'image est trop lourde';
                            $image = $post['image'];
                        }

                    } else {
                        $image = $post['image'];
                    }

                    $content =  htmlspecialchars($_POST['content'], ENT_HTML5);

                    $data = [
                        'id'            => $_GET['id'],
                        'title'         => $_POST['title'],
                        'subtitle'      => $_POST['subtitle'],
                        'content'       => $content,
                        'image'         => $image,
                        'active'        => $_POST['active']
                    ];

                    if ($this->blogModel->updatePost($data)) {
                        $message['success'] = 'L\'article a bien été modifié !';
                    }

                    $post = $this->blogModel->getPostById($_GET['id']);

                }

                $post['content'] =  htmlspecialchars_decode($post['content'], ENT_HTML5);

                echo $this->twig->render('admin/blog/edit.html.twig', [
                    'post'      => $post,
                    'message'   => $message
                ]);
            } else {
                $this->redirect404();
            }
        } else {
            $this->redirect404();
        }
    }

    public function deletePost() {
        // TODO: remove comments
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['postId']) && $post = $this->blogModel->getPostById($_POST['postId'])) {

                $image = $post['image'];
                $path = 'uploads/';

                $this->removeImage($image, $path);

                if ($this->model->delete('posts', $post['id'])) {
                    $this->index("L'article a bien été supprimé", null);
                } else {
                    $this->index(null, "L'article n'a pas pu être supprimé");
                }
            } else {
                $this->redirect404();
            }
        } else {
            header('Location: ?c=adminBlog');
            exit;
        }


    }
}