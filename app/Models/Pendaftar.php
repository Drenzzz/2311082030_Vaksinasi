<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendaftar extends Model
{
    use HasFactory, SoftDeletes;

    // HasFactory Memungkinkan kamu buat data dummy pakai factory (contoh untuk testing atau seeding database
    // Membuat sistem hapus data tanpa benar-benar menghapus di database

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'jenis_vaksin',
        'lokasi_vaksin',
        'tanggal_vaksin',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_vaksin' => 'date',
    ];
}
