<?php

namespace Controllers;


class AdminBlogController extends Controller
{
    /*
     * List of blog post
     */
    public function index($success, $error) {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin())
            header('Location: ?c=login');

        // get all posts
        $posts = $this->model->getAll('posts');

        $message = [
            'success'   => $success,
            'error'     => $error
        ];

        // render the list of blog posts
        echo $this->twig->render('admin/blog/list.html.twig', [
            'posts'     => $posts,
            'message'   => $message,
        ]);

    }


    /*
     * Delete post
     */
    public function deletePost() {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin())
            header('Location: ?c=login');

        // if method is "post" and if the blog post exist => remove the blog post + comment + image
        // TODO: remove comments
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['postId']) && $post = $this->blogModel->getPostById($_POST['postId'])) {

                $image = $post['image'];
                $path = 'assets/img/uploads/';

                // remove image
                $this->removeImage($image, $path);

                if ($this->model->delete('posts', $post['id'])) {
                    $this->index("L'article a bien été supprimé", null);
                } else {
                    $this->index(null, "L'article n'a pas pu être supprimé");
                }
            } else {
                //redirect to the list of blog posts
                header('Location: ?c=adminBlog');
                exit;
            }
        } else {
            //redirect to the list of blog posts
            header('Location: ?c=adminBlog');
            exit;
        }


    }

    /*
     * Edit & Add blog post
     * If $_GET['id] , then we are editing a blog post.
     * Else, we are adding a blog post
     */
    public function edit() {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin())
            header('Location: ?c=login');

        // if we get the id, then we define $post, else, $post = null
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

            // check if the fields are not empty
            if (!empty($_POST['title']) && !empty($_POST['subtitle']) && !empty($_POST['content'])) {

                // if the "active" field does not exist, it is set to 0 (false)
                if (!isset($_POST['active'])) {
                    $_POST['active'] = 0;
                }

                // check if there is a submitted image & if there is no errors
                if (isset($_FILES['image']) AND $_FILES['image']['error'] == 0) {

                    // Check image size
                    if ($_FILES['image']['size'] <= 1000000) {

                        $infoImage = pathinfo($_FILES['image']['name']);
                        $imageExtension = $infoImage['extension'];
                        // allowed extensions
                        $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png');

                        // check if the image extension is valid
                        if (in_array($imageExtension, $allowedExtensions)) {

                            // if $post is defined, remove the old image
                            if ($post != null) {
                                $this->removeImage($post['image'], 'assets/img/uploads/');
                            }

                            // move the image into the uploads folder
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

                // remove html characters in the database
                $content =  htmlspecialchars($_POST['content'], ENT_HTML5);

                $data = [
                    'title'         => $_POST['title'],
                    'subtitle'      => $_POST['subtitle'],
                    'content'       => $content,
                    'image'         => $image,
                    'active'        => $_POST['active']
                ];

                // if we are editing, reload the edited post with the new values
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

            } else {
                $message['error'] = 'Des champs obligatoires n\'ont pas été rempli';
            }
        }


        echo $this->twig->render('admin/blog/edit.html.twig', [
            'post'      => $post,
            'message'   => $message
        ]);

    }
}