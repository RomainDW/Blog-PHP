<?php


namespace Controllers;


class DashboardController extends Controller
{
    public function index() {

        echo $this->twig->render('admin/dashboard/dashboard.html.twig');

    }
}