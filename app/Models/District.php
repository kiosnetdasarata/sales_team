<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'regencies_id',
        'nama',
    ];
    // public function customer_closing(){
    //     return $this->belongsTo(CustomerClosing::class, 'id');

    // }
    public function regencie(){
        return $this->belongsTo(Regencie::class, 'regencies_id');

    }
    public function village(){
        return $this->hasMany(Village::class, 'id');

    }
}
