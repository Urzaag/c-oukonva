<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
    public function index(): string
    {
        return $this->twig->render('404/404.html.twig');
    }
}
