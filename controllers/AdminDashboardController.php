<?php


namespace Controllers;


class AdminDashboardController extends Controller
{
    /*
     * Show the dashboard
     */
    public function index() {

        if (!$this->isAdmin())
            header('Location: ?c=login');

        $config = $this->model->getConfig();

        echo $this->twig->render('admin/dashboard/index.html.twig', [
            'config'    => $config,
            'message'   => $this->msg
        ]);

    }


    /**
     * Update the config
     */
    public function editConfig() {

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
}