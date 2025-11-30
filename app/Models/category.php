<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'picture',
    ];
    
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
