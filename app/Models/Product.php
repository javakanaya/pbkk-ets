<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }
    
    public function condition()
    {
        return $this->belongsTo(ProductCondition::class);
    }
}
