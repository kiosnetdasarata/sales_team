<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClosing extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'prospect_id',
        'paket_id',
        'promo_id',
        'nik',
        'nama',
        'jk',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'dusun_id',
        'tgl_lahir',
        'fto_ktp',
        'fto_rumah'
    ];
}
