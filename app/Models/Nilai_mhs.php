<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_mhs extends Model
{
    use HasFactory;
    //tambahkan kode untuk mapping ke tabel nilai_mhs
    //tambahkan fillable untuk menentukan atribut yang dapat diisi secara massal dalam model Eloquent
    protected $fillable = [
        'nama',
        'nim',
        'jurusan_id',
        'kota',
        'provinsi',
        'matakuliah_id',
        'foto',
    ];

    public function jurusan()
    {
        //menggunakan belongsTo untuk mendifinikan hubungan one to one / one to many dari model saat ini ke model lainnya
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }
}
