<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function reinsurer()
    {
        //return $this->belongsToMany(Reinsurers::class, 'reinsurer_regions', 'region_id');
        return $this->hasMany(Reinsurers::class);

    }
}

