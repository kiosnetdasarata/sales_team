<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
    ];
    public function customer_closing(){
        return $this->hasMany(CustomerClosing::class, 'id');

    }
    public function regencie(){
        return $this->hasMany(Regencie::class, 'id');

    }
}
