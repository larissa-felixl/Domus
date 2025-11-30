<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class property extends Model
{
    protected $fillable = [
        "adress",
        "price",
        "type",
        "status",
        "picture",
        "category_id",
        "owner_name"
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
