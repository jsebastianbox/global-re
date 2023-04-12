<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sercorp extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_code',
        'process_link',
        'entity',
        'object',
        'budget',
        'date_publication',
        'status',
        'awardee_id',
        'awardee_value',
        'coment',
        'alerta',
    ];

    public $timestamps = true;

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function awardee()
    {
        return $this->belongsTo(Insurance::class);
    }

    
}
