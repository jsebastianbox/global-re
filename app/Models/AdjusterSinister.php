<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdjusterSinister extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reference',
        'country_id',
        'contact_id',
        'region_id',
        'position_id',
        'business',
        'excluye',
        'email',
        'phone_one',
        'phone_two',
        'phone_three',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
