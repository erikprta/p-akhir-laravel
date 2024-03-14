<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    //tambahkan fillable untuk menentukan atribut yang dapat diisi secara massal dalam model Eloquent
    protected $fillable = [
        'nama',
        'nilai',
    ];
    //tambahkan kode untuk mapping ke tabel matakuliah
    protected $table = 'matakuliah'; 
}
