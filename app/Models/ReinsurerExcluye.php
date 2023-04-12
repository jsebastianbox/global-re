<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReinsurerExcluye extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'reinsurer_id'
    ];

    public function reinsurer()
    {
        return $this->belongsTo(Reinsurers::class);
    }

}
