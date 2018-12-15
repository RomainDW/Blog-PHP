<?php


namespace Controllers;


class AdminCommentsController extends Controller
{
    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * Show the comments management page
     */
    public function index () {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }

        // get all comments that are unverified
        $comments = $this->commentsModel->getUnverifiedComments();

        echo $this->twig->render("admin/comments/index.html.twig", [
            'message'   => $this->msg,
            'comments'  => $comments
        ]);
    }


    /**
     * Make a comment verified
     */
    public function verified () {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commentId']) && $comment = $this->commentsModel->getById('comments', $_POST['commentId'])) {

            $this->commentsModel->setVerified($comment['id']);

            $this->msg->success('Le commentaire a été vérifié !', $this->getUrl(false, 'adminComments'));

        } else {

            $this->msg->error('Le commentaire n\'a pas pu été vérifié.', $this->getUrl(false, 'adminComments'));
        }
    }

    /**
     * Delete a comment
     */
    public function delete () {

        // if the user is not an admin, redirect to the login page
        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commentId']) && $comment = $this->commentsModel->getById('comments', $_POST['commentId'])) {

            $this->commentsModel->delete('comments', $comment['id']);

            $this->msg->success('Le commentaire a été supprimé !', $this->getUrl(false, 'adminComments'));

        } else {

            $this->msg->error('Le commentaire n\'a pas pu été supprimé.', $this->getUrl(false, 'adminComments'));
        }
    }
}