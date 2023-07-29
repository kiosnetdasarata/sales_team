<?php

namespace App\Models;

use App\Models\CustomerProspect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'status'
    ];
    public function customer_prospect(){
        return $this->hasMany(CustomerProspect::class, 'id');
    }
}
