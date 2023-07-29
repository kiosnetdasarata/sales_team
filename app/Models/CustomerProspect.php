<?php

namespace App\Models;

use App\Models\Status;
use App\Models\MetodeBertemu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerProspect extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_tlpn',
        'metode_bertemu_id',
        'status_id'
    ];
    public function status(){
        return $this->belongsTo(Status::class, 'status_id');

    }
    public function metode_bertemu(){
        return $this->belongsTo(MetodeBertemu::class, 'metode_bertemu_id');

    }
}
