<?php


namespace Controllers;


class AdminCommentsController extends Controller
{
    public function index () {

        $comments = $this->commentsModel->getUnverifiedComments();

        echo $this->twig->render("admin/comments.html.twig", [
            'message'   => $this->msg,
            'comments'  => $comments
        ]);
    }


    public function verified () {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commentId']) && $comment = $this->commentsModel->getById('comments', $_POST['commentId'])) {

            $this->commentsModel->setVerified($comment['id']);

            $this->msg->success('Le commentaire a été vérifié !', $_SERVER['PHP_SELF'].'?c=adminComments');

        } else {

            $this->msg->error('Le commentaire n\'a pas pu été vérifié.', $_SERVER['PHP_SELF'].'?c=adminComments');
        }
    }

    public function delete () {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['commentId']) && $comment = $this->commentsModel->getById('comments', $_POST['commentId'])) {

            $this->commentsModel->delete('comments', $comment['id']);

            $this->msg->success('Le commentaire a été supprimé !', $_SERVER['PHP_SELF'].'?c=adminComments');

        } else {

            $this->msg->error('Le commentaire n\'a pas pu été supprimé.', $_SERVER['PHP_SELF'].'?c=adminComments');
        }
    }
}