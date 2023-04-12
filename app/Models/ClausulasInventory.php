<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClausulasInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomenclatura',
        'title',
        'languages',
        'coverages'
    ];
}
