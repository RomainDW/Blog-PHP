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

        echo $this->twig->render('admin/dashboard/index.html.twig');

    }
}