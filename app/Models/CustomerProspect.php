<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProspect extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'no_tlpn'
    ];

}
