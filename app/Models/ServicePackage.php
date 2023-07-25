<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_layanan',
        'harga',
    ];
    public function customer_closing(){
        return $this->hasMany(CustomerClosing::class, 'id');

    }
}
