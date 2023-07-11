<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TeksController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\User;
use App\Models\Kategori;

use GuzzleHttp\Client;

class HomeController extends Controller
{

    public function index(User $user, Request $request){
        $user = Auth::user();
        $sortByCategory = $request->input('sort_by_category');
        $sortOrder = $request->input('sort_order', 'asc');

        $beritas = Berita::where('user_id', $user->id);
        
        if ($sortByCategory) {
            $beritas = $beritas->orderBy('kategori_asli', $sortOrder);
        }

        $beritas = $beritas->simplePaginate(25);

        $kategoris = [];
        foreach ($beritas as $berita) {
            $categories = Kategori::where('id_teks', $berita->id)->get();
            $kategoris[] = $categories;
        }

        return view('user.home', compact('beritas','kategoris','sortOrder','sortByCategory'));
    }
    
    public function destroy(Berita $berita){
    
        $berita->delete();

        return redirect()->route('home');
    
    }
}
