<?php

namespace Controllers;


class BlogController extends Controller
{

    public function index() {

        // define how many results you want per page
        $results_per_page = $this->model->getConfig();

        // find out the number of results stored in database
        $number_of_posts = $this->blogModel->getNumberOfPosts();

        // determine number of total pages available
        $number_of_pages = ceil($number_of_posts/$results_per_page);

        // Minimum 1 page
        if ($number_of_pages == 0)
            $number_of_pages = 1;

        // determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // check if the page exist
        if ($page > $number_of_pages || $page == 0) {
            $this->redirect404();
        }

        // determine the sql LIMIT starting number for the results on the displaying page
        $this_page_first_result = ($page-1)*$results_per_page;

        // retrieve selected results from database and display them on page
        $posts = $this->blogModel->getPostsPagination($this_page_first_result, $results_per_page);


        echo $this->twig->render('front/blog/index.html.twig', [
            'posts' => $posts,
            'numberOfPages' => $number_of_pages,
        ]);
    }

    /*
     * Show a blog post
     */
    public function post() {

        // if the post exist, show the post, else, redirect to a 404 error page
        if (isset($_GET['id']) && $post = $this->blogModel->getPostById($_GET['id'])) {

            // if the post is published or if the user is logged as admin, show the post, else, redirect to a 404 error page
            if ($post['active'] || $this->isAdmin()) {
                $post['content'] = htmlspecialchars_decode($post['content'], ENT_HTML5);

                // if user or admin is logged
                if ($this->isLogged()) {

                    $maxLength = 500;

                    /*
                     * if the user or the admin submit a comment and if fields are not empty,
                     * add the comment and show the comments list.
                     *
                     * Else, show all comments
                     */
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        if (empty($_POST['content']) || empty($_POST['id_user'])) {

                            $this->msg->error("Tous les champs n'ont pas été remplis", $this->getUrl(true) . '#comments-notification');

                        } elseif (strlen($_POST['content']) > $maxLength) {

                            $this->msg->error("Le commentaire fait plus de $maxLength caractères", $this->getUrl(true) . '#comments-notification');

                        } else {

                            $user = $this->model->getById('users', $_POST['id_user']);
                            $content = htmlspecialchars($_POST['content']);

                            $data = [
                                'id_user'   => $user['id'],
                                'id_post'   => $post['id'],
                                'content'   => $content
                            ];

                            if ($this->commentsModel->setComment($data)) {
                                $this->msg->warning("Commentaire en attente de validation", $this->getUrl(true).'#comments-notification');
                            } else {
                                $this->msg->error("Le commentaire n'a pas pu être ajouté", $this->getUrl(true).'#comments-notification');
                            }
                        }
                    }

                    $comments = $this->commentsModel->getVerifiedCommentsByPostId($post['id']);

                } else {
                    $comments = null;
                }

                echo $this->twig->render('front/post/index.html.twig', [
                    'post'      => $post,
                    'comments'  => $comments,
                    'message'   => $this->msg
                ]);

            } else {
                $this->redirect404();
            }

        } else {
            $this->redirect404();
        }
    }
}