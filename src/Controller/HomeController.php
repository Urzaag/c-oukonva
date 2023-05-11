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

    public function sort()
    {
        $question1 = $question2 = $question3 = $question4 = "";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $question1 = $_POST['question1'];
            $question2 = $_POST['question2'];
            $question3 = $_POST['question3'];
            $question4 = $_POST['question4'];
            $itemManager = new ItemManager();
            $result = $itemManager->sort($question1, $question2, $question3, $question4);
            return $this->twig->render('Map/map.html.twig', ['result' => $result]);
        }
    }
}
