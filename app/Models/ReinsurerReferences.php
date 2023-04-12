<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReinsurerReferences extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation'
    ];

    public function reinsurer()
    {
        return $this->hasOne(Reinsurers::class);
    }
}
