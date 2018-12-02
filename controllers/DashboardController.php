<?php


namespace Controllers;


class DashboardController extends Controller
{
    public function index($success, $error) {

        $posts = $this->model->getAll('posts');

        $message = [
            'success'   => $success,
            'error'     => $error
        ];

        echo $this->twig->render('admin/dashboard/dashboard.html.twig', [
            'posts'     => $posts,
            'message'   => $message,
        ]);

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
            header('Location: ?c=dashboard');
            exit;
        }


    }
}