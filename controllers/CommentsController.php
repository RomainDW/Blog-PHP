<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 18/12/18
 * Time: 18:58
 */

namespace Controllers;


class CommentsController extends Controller
{
    public function addComment() {

        // if user or admin is logged
        if ($this->isLogged()) {

            $config = $this->model->getConfig();

            $maxLength = $config['characters'];

            /*
             * if the user or the admin submit a comment and if fields are not empty, add the comment
             * else, redirect 404
             */
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (empty($_POST['content']) || empty($_POST['id_user']) || empty($_POST['id_post'])) {

                    $this->msg->error("Tous les champs n'ont pas été remplis", $this->getUrl(true) . '#comments-notification');

                } elseif (strlen($_POST['content']) > $maxLength) {

                    $this->msg->error("Le commentaire fait plus de $maxLength caractères", $this->getUrl(true) . '#comments-notification');

                } else {

                    $user = $this->model->getById('users', $_POST['id_user']);
                    $content = $_POST['content'];

                    $data = [
                        'id_user'   => $user['id'],
                        'id_post'   => $_POST['id_post'],
                        'content'   => $content
                    ];

                    if ($this->commentsModel->setComment($data)) {
                        $this->msg->warning("Commentaire en attente de validation", $this->getUrl(false, 'blog', 'post').'&id='.$_POST['id_post'].'#comments-notification');
                    } else {
                        $this->msg->error("Le commentaire n'a pas pu être ajouté", $this->getUrl(false, 'blog', 'post').'&id='.$_POST['id_post'].'#comments-notification');
                    }
                }
            } else {
                $this->redirect404();
            }

        } else {
            $this->redirect404();
        }
    }
}