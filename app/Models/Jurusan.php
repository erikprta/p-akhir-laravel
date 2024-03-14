<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    //tambahkan fillable untuk menentukan atribut yang dapat diisi secara massal dalam model Eloquent
    protected $fillable = [
        'nama',
    ];
    //tambahkan kode untuk mapping ke tabel jurusan
    protected $table = 'jurusan'; 
}
