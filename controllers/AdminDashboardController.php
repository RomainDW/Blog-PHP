<?php


namespace Controllers;


class AdminDashboardController extends Controller
{
    /*
     * Show the dashboard
     */
    public function index() {

        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }

        $config = $this->model->getConfig();

        $users = $this->usersModel->getAll('users');

        echo $this->twig->render('admin/dashboard/index.html.twig', [
            'config'    => $config,
            'message'   => $this->msg,
            'users'     => $users
        ]);

    }


    /**
     * Update the config
     */
    public function editConfig() {

        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }

        // if it's a post method & edit_config is submitted & ppp value is not empty, then update the config, else, redirect to a 404 error page
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['edit_config']) && !empty($_POST['ppp'])) {

            // post per page
            $ppp = $_POST['ppp'];

            //if it works, redirect to the dashboard and show success message
            if ($this->model->updateConfig($ppp)) {

                $this->msg->success("Le nombre d'article par page est maintenant limité à $ppp", $this->getUrl(false, 'adminDashboard'));

            // if it doesn't works, redirect to the dashboard and show error message
            } else {

                $this->msg->error("Une erreur s'est produite", $this->getUrl(false, 'adminDashboard'));
            }

        } else {
            $this->redirect404();
        }
    }

    public function updateUser() {

        if (!$this->isAdmin()) {
            header('Location: ?c=login');
            exit;
        }

        // if it's a userDown post
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userDown']) && !empty($_POST['userDown'])) {

            $userId = $_POST['userDown'];
            $user = $this->usersModel->getById('users', $userId);

            if ($this->usersModel->updateRoleUser(0, $userId)) {
                $this->msg->success($user['name']."est passé au rang de simple utilisateur", $this->getUrl(false, 'adminDashboard'));
            } else {
                $this->msg->error("Une erreur s'est produite", $this->getUrl(false, 'adminDashboard'));
            }

        // if it's a userUp post
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userUp']) && !empty($_POST['userUp'])) {

            $userId = $_POST['userUp'];
            $user = $this->usersModel->getById('users', $userId);

            if ($this->usersModel->updateRoleUser(1, $userId)) {
                $this->msg->success($user['name']."est passé au rang d'administrateur", $this->getUrl(false, 'adminDashboard'));
            } else {
                $this->msg->error("Une erreur s'est produite", $this->getUrl(false, 'adminDashboard'));
            }

        } else {
            $this->msg->error("Erreur lors de l'envoie des données", $this->getUrl(false, 'adminDashboard'));
        }
    }
}