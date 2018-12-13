<?php


namespace Controllers;


class DashboardController extends Controller
{
    /*
     * Show the dashboard
     */
    public function index() {
        if (!$this->isAdmin())
            header('Location: ?c=login');

        echo $this->twig->render('admin/dashboard/dashboard.html.twig');

    }
}