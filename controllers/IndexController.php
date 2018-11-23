<?php

namespace Controllers;


class IndexController extends Controller
{
    public function index() {

        echo $this->twig->render('index/home.html.twig');
    }

}