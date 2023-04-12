<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCoverage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'branch_id'
    ];

    public function slip()
    {
        return $this->hasMany(Slip::class, 'type_coverage');
    }
}
