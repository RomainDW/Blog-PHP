<?php

namespace Controllers;


use Engine\Config;

class BlogController extends Controller
{

    public function index() {

        // define how many results you want per page
        $results_per_page = Config::PPP;

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


        echo $this->twig->render('front/blog/blog.html.twig', [
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

            $post['content'] = htmlspecialchars_decode($post['content'], ENT_HTML5);

            echo $this->twig->render('front/blog/post.html.twig', [
                'post' => $post,
            ]);

        } else {
            $this->redirect404();
        }
    }
}