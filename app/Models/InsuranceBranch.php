<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'insurance_id',
        'branch_id'
    ];
}
