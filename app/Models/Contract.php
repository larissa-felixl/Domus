<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'title',
        'file',
        'start_date',
        'end_date',
        'value',
        'type',
        'status',
        'description',
    ];

    /**
     * Relacionamento muitos-para-muitos com Costumer
     */
    public function costumers()
    {
        return $this->belongsToMany(Costumer::class)
                    ->withTimestamps()
                    ->withPivot('role'); // Inclui o campo 'role' da tabela pivot
    }
}
