<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class ApiController extends Controller
{
    public function apiWithoutKey()
    {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://localhost:5000/api/predict";

        $data = "sudah dua bulan sektor pariwisata sudah menyetop aks wisata para turi tak adanya kegiatan sama sekali waktu lama membuat pariwisata terpuruk berbagai sektor";
       
        $params = [
            "string" => $data
        ];

        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => [],
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
            dump($responseBody);
        return view('user.api', compact('responseBody'));
    }
}
