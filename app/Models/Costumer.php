<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    protected $fillable = [
        "name",
        "email",
        "phone",
        "type",
        "status",
        "picture",
    ];

    /**
     * Relacionamento muitos-para-muitos com Contract
     */
    public function contractsList()
    {
        return $this->belongsToMany(Contract::class)
                    ->withTimestamps()
                    ->withPivot('role'); // Inclui o campo 'role' da tabela pivot
    }
}
