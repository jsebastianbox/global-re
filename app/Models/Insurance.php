<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'name',
        'registered_name',
        'contact',
        'position',
        'coverage',
        'email',
        'phone',
        'phone_two',
        'phone_three',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function branch()
    {
        return $this->belongsToMany(Branch::class, 'insurance_branches','insurance_id');
    }
}
