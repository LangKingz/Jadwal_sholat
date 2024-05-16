<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;


class ApiController extends Controller
{
    //
    public function Fetch()
    {
        $client = new Client();
        $currentDate = date('Y-m-d');
        $url = 'https://api.myquran.com/v2/sholat/jadwal/2013/' . $currentDate;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $data = json_decode($content, true);
        $jadwalSholat = $data['data']['jadwal'];
        return view('index', compact('jadwalSholat'));
    }
}
