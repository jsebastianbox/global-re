<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compromiso extends Model
{
    use HasFactory;

    protected $table = "compromiso";

    protected $fillable = [
        "date",
        "insured",
        "branch",
        "step",
    ];

    public $timestamps = true;

    public function slip() {
        $this->hasMany(SlipAp::class);
    }
}
