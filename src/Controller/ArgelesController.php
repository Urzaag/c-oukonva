<?php

namespace App\Controller;

use App\Model\APIManager;
use Symfony\Component\HttpClient\HttpClient;

class ArgelesController extends AbstractController
{
    public function argeles()
    {
        //$curl = curl_init('https://api.openweathermap.org/data/2.5/weather?lat=-22.908333&lon=-43.196388&appid=97d64e56f970ab375005e4db20903178');

        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'https://api.openweathermap.org/data/2.5/weather?lat=-42.546214&lon=3.022911&appid=97d64e56f970ab375005e4db20903178&units=metric&lang=fr'
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
        $temp = $data['main']['temp'];
        if ($temp < 12) {
            $phrase = 'On s\'caille les miches ici ou quoi';
        } elseif ($temp <= 12 && $temp < 14) {
            $phrase = 'Allez ressers moué la ch\'tite soeur qu\'on oublie ce temps d\'chiotte';
        } elseif ($temp >= 14 && $temp < 16) {
            $phrase = 'C\'est parti mon kiki on file à la pistoche !';
        } else {
            $phrase = 'Tu penses bien qu\'j\'ai po qu\'ça qu\'à foutre moi d\'écrire toutes les témpératures hein';
        }

        return $this->twig->render('Campings/argeles.html.twig', ['temp' => $temp, 'phrase' => $phrase]);
    }
}
