<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'district_id',
        'nama',
    ];
    // public function customer_closing(){
    //     return $this->hasMany(CustomerClosing::class, 'id');

    // }
    public function district(){
        return $this->belongsTo(District::class, 'district_id');

    }
}
