<?php

namespace App\Controller;

use App\Model\ItemManager;
use Symfony\Component\HttpClient\HttpClient;

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
            $camping1 = HttpClient::create();
            $response = $camping1->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather?lat=50.516087&lon=1.638790&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
            );

            //'https://api.openweathermap.org/data/2.5/weather?lat=42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            //$content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            $data = json_decode($content, true);
            $temp1 = $data['main']['temp'];
            if ($temp1 < 12) {
                $phrase1 = 'On s\'caille les miches ici ou quoi';
            } elseif ($temp1 >= 12 && $temp1 < 16) {
                $phrase1 = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
            } elseif ($temp1 >= 16 && $temp1 < 30) {
                $phrase1 = 'C\'est parti mon kiki on file à la pistoche !';
            } else {
                $phrase1 = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
            };

            $camping2 = HttpClient::create();
            $response = $camping2->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather?lat=44.581192&lon=-1.212460&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
            );

            //'https://api.openweathermap.org/data/2.5/weather?lat=42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            //$content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            $data = json_decode($content, true);
            $temp2 = $data['main']['temp'];
            if ($temp2 < 6) {
                $phrase2 = 'On s\'caille les miches ici ou quoi';
            } elseif ($temp2 >= 6 && $temp2 < 12) {
                $phrase2 = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
            } elseif ($temp2 >= 12 && $temp2 < 20) {
                $phrase2 = 'C\'est parti mon kiki on file à la pistoche !';
            } else {
                $phrase2 = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
            };

            $camping3 = HttpClient::create();
            $response = $camping3->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather?lat=42.964127&lon=1.605232&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
            );

            //'https://api.openweathermap.org/data/2.5/weather?lat=42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            //$content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            $data = json_decode($content, true);
            $temp3 = $data['main']['temp'];
            if ($temp3 < 12) {
                $phrase3 = 'On s\'caille les miches ici ou quoi';
            } elseif ($temp3 >= 12 && $temp3 < 14) {
                $phrase3 = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
            } elseif ($temp3 >= 14 && $temp3 < 16) {
                $phrase3 = 'C\'est parti mon kiki on file à la pistoche !';
            } else {
                $phrase3 = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
            };

            $camping4 = HttpClient::create();
            $response = $camping4->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather?lat=43.355966&lon=3.527539&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
            );

            //'https://api.openweathermap.org/data/2.5/weather?lat=42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            //$content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            $data = json_decode($content, true);
            $temp4 = $data['main']['temp'];
            if ($temp4 < 12) {
                $phrase4 = 'On s\'caille les miches ici ou quoi';
            } elseif ($temp4 >= 12 && $temp4 < 14) {
                $phrase4 = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
            } elseif ($temp4 >= 14 && $temp4 < 16) {
                $phrase4 = 'C\'est parti mon kiki on file à la pistoche !';
            } else {
                $phrase4 = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
            };

            $camping5 = HttpClient::create();
            $response = $camping5->request(
                'GET',
                'https://api.openweathermap.org/data/2.5/weather?lat=43.433152&lon=6.737034&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
            );

            //'https://api.openweathermap.org/data/2.5/weather?lat=42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'

            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}'
            //$content = $response->toArray();
            // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
            $data = json_decode($content, true);
            $temp5 = $data['main']['temp'];
            if ($temp5 < 12) {
                $phrase5 = 'On s\'caille les miches ici ou quoi';
            } elseif ($temp5 >= 12 && $temp5 < 14) {
                $phrase5 = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
            } elseif ($temp5 >= 14 && $temp5 < 16) {
                $phrase5 = 'C\'est parti mon kiki on file à la pistoche !';
            } else {
                $phrase5 = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
            };

            return $this->twig->render('Map/map.html.twig', [
                'result' => $result,
                'displayPin1' => $display1,
                'displayPin2' => $display2,
                'displayPin3' => $display3,
                'displayPin4' => $display4,
                'displayPin5' => $display5,
                'temp1' => $temp1, 'phrase1' => $phrase1,
                'temp2' => $temp2, 'phrase2' => $phrase2,
                'temp3'=>$temp3, 'phrase3'=>$phrase3,
                'temp4'=>$temp4, 'phrase4'=>$phrase4,
                'temp5'=>$temp5, 'phrase5'=>$phrase5
            ]);

        }
    }
}
