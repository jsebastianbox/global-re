<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function reinsurer()
    {
        return $this->hasOne(Reinsurers::class);
    }

    public function insurance()
    {
        return $this->hasOne(Insurance::class);
    }

    public function adjustersinisters()
    {
        return $this->hasOne(AdjusterSinister::class);

    }
}
