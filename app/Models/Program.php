<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_program',
        'nominal',
        'jenis_promo'
    ];
    public function program(){
        return $this->hasMany(CustomerClosing::class, 'id');

    }
}
