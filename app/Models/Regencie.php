<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'province_id',
        'nama',
    ];
    public function customer_closing(){
        return $this->hasMany(CustomerClosing::class, 'id');

    }
    public function province(){
        return $this->belongsTo(Province::class, 'province_id');

    }
    public function district(){
        return $this->hasMany(District::class, 'id');

    }
}
