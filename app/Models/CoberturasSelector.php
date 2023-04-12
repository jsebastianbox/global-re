<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoberturasSelector extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'main_branch',
        'sub_branch'
    ];

    public function slip()
    {
        return $this->hasMany(Slip::class);
    }
    
    public function slips()
    {
        return $this->belongsToMany(Slip::class);
    }
}
