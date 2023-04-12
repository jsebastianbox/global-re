<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awardee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function sercorp()
    {
        return $this->hasOne(Sercorp::class);
    }
}
