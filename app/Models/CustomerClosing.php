<?php

namespace App\Models;

use App\Models\Program;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use App\Models\Regencie;
use App\Models\CustomerProspect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->belongsTo(ServicePackage::class, 'paket_id');

    }
    public function province(){
        return $this->belongsTo(Province::class, 'provinsi_id');

    }
    public function regencie(){
        return $this->belongsTo(Regencie::class, 'kota_id');

    }
    public function district(){
        return $this->belongsTo(District::class, 'kecamatan_id');

    }
    public function village(){
        return $this->belongsTo(Village::class, 'dusun_id');

    }
}
