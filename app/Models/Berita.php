<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'text';

    protected $fillable = [
        'judul',
        'teks',
        'kategori_asli',
        'user_id'
    ];
}
