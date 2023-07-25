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

    public function customer_prospect(){
        return $this->belongsTo(CustomerProspect::class, 'prospect_id');

    }
    public function program(){
        return $this->belongsTo(Program::class, 'promo_id');

    }
    public function service_package(){
        return $this->belongsTo(Program::class, 'paket_id');

    }
    public function province(){
        return $this->belongsTo(Province::class, 'provinsi_id');

    }
    public function regencie(){
        return $this->belongsTo(Regenciee::class, 'kota_id');

    }
    public function district(){
        return $this->belongsTo(District::class, 'kecamatan_id');

    }
    public function village(){
        return $this->belongsTo(Village::class, 'dusun_id');

    }
}
