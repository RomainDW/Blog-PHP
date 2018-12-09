<?php


namespace Controllers;


class LoginController extends Controller
{
    public function index() {

        // TODO: redirect to "my account"
        if ( $this->isLogged())
            header('Location: ?c=index');

        $message = [
            'success'   => null,
            'error'     => null
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $userExist = $this->usersModel->getUser($email, $password);

            if (empty($email) || empty($password)) {

                $message['error'] = "Tous les champs n'ont pas été remplis";

            } elseif ( !$userExist) {

                $message['error'] = "Identifiant ou mot de passe incorrect !";

            } else {

                if ($userExist && $userExist['role'] == 1) {
                    $_SESSION['admin'] = $userExist['name'];
                    header('Location: ' . '?c=dashboard');
                } else {
                    $_SESSION['user'] = $userExist['name'];
                    header('Location: ' . '?c=blog');
                }
            }

        }

        echo $this->twig->render('front/login/index.html.twig', [
            'message'   => $message
        ]);
    }

    public function logout() {

        if ($this->isLogged()) {

            session_unset();
            session_destroy();
        }

        header('Location: ?c=login');


    }

}