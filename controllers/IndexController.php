<?php

namespace Controllers;


class IndexController extends Controller
{
    public function index() {

        echo $this->twig->render('front/index/home.html.twig');
    }

}