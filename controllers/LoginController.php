<?php


namespace Controllers;


class LoginController extends Controller
{
    /*
     * Show the login page
     */
    public function index() {

        // if the user is loged, redirect to "my account"
        // TODO: redirect to "my account"
        if ( $this->isLogged())
            header('Location: ?c=index');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $userExist = $this->usersModel->getUser($email, $password);

            // check if email & password are empty
            if (empty($email) || empty($password)) {

                $this->msg->error("Tous les champs n'ont pas été remplis", $this->getUrl(true));

            // check if the user exist
            } elseif ( !$userExist) {

                $this->msg->error("Identifiant ou mot de passe incorrect !", $this->getUrl(true));

            } else {

                // if role = 1, run admin session, else, run user session
                if ($userExist && $userExist['role'] == 1) {
                    $_SESSION['admin'] = $userExist;
                    header('Location: ' . '?c=dashboard');
                } else {
                    $_SESSION['user'] = $userExist;
                    header('Location: ' . '?c=blog');
                }
            }

        }

        echo $this->twig->render('front/login/index.html.twig', [
            'message'   => $this->msg
        ]);
    }

    /*
     * Show the registration page
     */
    public function registration() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $password = htmlspecialchars($_POST['password']);
            $passwordCheck = htmlspecialchars($_POST['passwordCheck']);
            $userExist = $this->usersModel->checkUserByEmail($email);

            // check if fields are empty
            if (empty($email) || empty($name) || empty($password) || empty($passwordCheck)) {

                $this->msg->error("Tous les champs n'ont pas été remplis", $this->getUrl(true));

            // check if passwords match
            } elseif ($password != $passwordCheck) {

                $this->msg->error("Les mots de passe ne correspondent pas", $this->getUrl(true));

            // check if user exist
            } elseif ($userExist) {
                $this->msg->error("Cet utilisateur existe déjà", $this->getUrl(true));
            } else {

                $data = [
                    'name'      => $_POST['name'],
                    'email'     => $_POST['email'],
                    'password'  => sha1($_POST['password']),
                    'role'      => 0
                ];

                // create the user then redirect to "my account"
                if ($this->usersModel->setUser($data)) {
                    //TODO: redirect to "my account"
                    $this->msg->success("Compte créé", $this->getUrl(true));
                } else {
                    $this->msg->error("Une erreur s'est produite", $this->getUrl(true));
                }

            }
        }

        echo $this->twig->render('front/login/registration.html.twig', [
            'message'   => $this->msg
        ]);
    }

    /*
     * log out the user then redirect to the home page
     */
    public function logout() {

        if ($this->isLogged()) {

            session_unset();
            session_destroy();
        }

        header('Location: ?c=index');


    }

}