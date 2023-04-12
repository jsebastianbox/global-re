<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'code'
    ];

    public function slip()
    {
        return $this->hasOne(AdjusterSinister::class);
    }

    public function adjuster()
    {
        return $this->hasOne(AdjusterSinister::class);
    }

    public function insurance()
    {
        return $this->hasOne(Insurance::class);
    }

    public function reinsurer()
    {
        return $this->hasOne(Reinsurers::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
