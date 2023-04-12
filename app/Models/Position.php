<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function reinsurer()
    {
        //return $this->hasMany(Reinsurers::class);
        return $this->hasOne(Reinsurers::class);
    }

    public function insurance()
    {
        return $this->hasOne(Insurance::class);

    }

    public function adjuster_sinisters()
    {
        return $this->hasOne(AdjusterSinister::class);

    }
}
