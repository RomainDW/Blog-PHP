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

    public function deletePost() {
        // TODO: remove comments
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['postId']) && $post = $this->blogModel->getPostById($_POST['postId'])) {

                $image = $post['image'];
                $path = 'assets/img/uploads/';

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

    public function edit() {

        if (isset($_GET['id']) && $this->blogModel->getPostById($_GET['id']) != null) {
            $post = $this->blogModel->getPostById($_GET['id']);
            $post['content'] =  htmlspecialchars_decode($post['content'], ENT_HTML5);
        } else {
            $post = null;
        }

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

                        if ($post != null) {
                            $this->removeImage($post['image'], 'assets/img/uploads/');
                        }

                        move_uploaded_file($_FILES['image']['tmp_name'],  'assets/img/uploads/' . basename($_FILES['image']['name']));

                        $image = basename($_FILES['image']['name']);
                    } else {
                        $message['error'] = 'Le format de l\'image n\'est pas supporté';

                        if ($post != null) {
                            $image = $post['image'];
                        } else {
                            $image = null;
                        }

                    }
                } else {
                    $message['error'] = 'L\'image est trop lourde';

                    if ($post != null) {
                        $image = $post['image'];
                    } else {
                        $image = null;
                    }
                }

            } else {
                if ($post != null) {
                    $image = $post['image'];
                } else {
                    $image = null;
                }
            }

            $content =  htmlspecialchars($_POST['content'], ENT_HTML5);

            $data = [
                'title'         => $_POST['title'],
                'subtitle'      => $_POST['subtitle'],
                'content'       => $content,
                'image'         => $image,
                'active'        => $_POST['active']
            ];

            if ($post != null) {

                $postId = $_GET['id'];

                if ($this->blogModel->updatePost($data, $postId)) {
                    $message['success'] = 'L\'article a bien été modifié !';
                } else {
                    $message['error'] = 'L\'article n\'a pas pu être modifié.';
                }

                $post = $this->blogModel->getPostById($_GET['id']);

                $post['content'] =  htmlspecialchars_decode($post['content'], ENT_HTML5);

            } else {

                if ($this->blogModel->setPost($data)) {
                    $message['success'] = 'L\'article a bien été ajouté !';
                } else {
                    $message['error'] = 'L\'article n\'a pas pu être ajouté.';
                }
            }
        }


        echo $this->twig->render('admin/blog/edit.html.twig', [
            'post'      => $post,
            'message'   => $message
        ]);

    }
}