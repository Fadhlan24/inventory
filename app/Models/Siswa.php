<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa'; // Nama tabel dalam database
    protected $fillable = ['nis', 'nama', 'gender', 'rombel', 'kelas', 'foto']; // Kolom yang dapat diisi
}
