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

            if (isset($_POST['question1'])) {
                $question1 = $_POST['question1'];
            } else {
                $question1 = 'jonhy';
            }

            if (isset($_POST['question2'])) {
                $question2 = $_POST['question2'];
            } elseif ($question1 = 'jonhy') {
                $question2 = 'slip';
            } else {
                $question2 = 'claquette';
            }

            if (isset($_POST['question3'])) {
                $question3 = $_POST['question3'];
            } elseif ($question1 = 'jonhy') {
                $question3 = 'mulet';
            } else {
                $question2 = 'claquette';
                $question3 = 'bob';
            }

            if (isset($_POST['question4'])) {
                $question4 = $_POST['question4'];
            } elseif ($question1 = 'jonhy') {
                $question4 = 'ricard';
            } else {
                $question2 = 'claquette';
                $question3 = 'bob';
                $question4 = 'biere';
            }

            $itemManager = new ItemManager();
            $result = $itemManager->sort($question1, $question2, $question3, $question4);

            if (count($result) > 1) {
                foreach ($result as $camping) {
                    $campingID[] = $camping['id'];
                }
            } else {
                    $campingID[] = 5;
                }

            $display1 = $display2 = $display3 = $display4 = $display5 = "";

            if (in_array('1', $campingID)) {
                $display1 = 'display';
            }
            if (in_array('2', $campingID)) {
                $display2 = 'display';
            }
            if (in_array('3', $campingID)) {
                $display3 = 'display';
            }
            if (in_array('4', $campingID)) {
                $display4 = 'display';
            }
            if (in_array('5', $campingID)) {
                $display5 = 'display';
            }
            return $this->twig->render('Map/map.html.twig', ['result' => $result, 'displayPin1' => $display1, 'displayPin2' => $display2, 'displayPin3' => $display3, 'displayPin4' => $display4, 'displayPin5' => $display5]);
        }
    }
}
