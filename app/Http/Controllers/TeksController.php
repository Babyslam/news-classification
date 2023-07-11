<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TeksController extends Controller
{
    public function index(){
        $kategoriAsliOptions = ['finance', 'food', 'health', 'news', 'otomotif', 'sport', 'travel'];
        return view('user.klasifikasi', compact('kategoriAsliOptions'));
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'teks' => 'required',
        ]);

        $client = new Client(); //GuzzleHttp\Client
        $url = "http://localhost:5000/api/predict";

        $data = $request['teks'];

        $params = [
            "string" => $data
        ];

        $response = $client->request('POST', $url, [
            'json' => $params,
            'headers' => [],
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $request['kategori'] = $responseBody[0];

        $berita = Berita::create(array(
            'judul'=> $request['judul'],
            'teks' => $request['teks'],
            'kategori_asli' => $request['kategori_asli'],
            'user_id'=>$request->user()->id,
        ));
        $berita_id = $berita->id;

        $kategori = Kategori::create(array(
            'id_teks' => $berita_id,
             
            'kategori' => $request['kategori'],
        ));

        return redirect()->route('home');
        
    }

}
