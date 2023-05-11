<?php

namespace App\Controller;

class MapController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Map/map.html.twig');
    }
}
