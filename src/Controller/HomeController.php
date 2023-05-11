<?php

namespace App\Controller;

use App\Model\ItemManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Home/index.html.twig');
    }
    public function sort($question1, $question2, $question3, $question4)
    {
        $question1 = $question2 = $question3 = $question4 = "";
        if ($_SERVER['REQUEST_METHOD'] === 'post') {
            $question1 = $_POST['']
            $itemManager = new ItemManager();
            $result = $itemManager->sort($question1, $question2, $question3, $question4);
            return $result;

    }
}
