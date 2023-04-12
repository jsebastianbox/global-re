<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bussines extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function reinsurer()
    {
        //return $this->belongsToMany(Reinsurers::class, 'reinsurer_bussines', 'bussines_id');
        return $this->belongsTo(Reinsurers::class);
    }
}
