<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function insurance()
    {
        return $this->belongsToMany(Insurance::class, 'insurance_branches','branch_id');
    }
}
