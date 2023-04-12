<?php

namespace App\Models;

use Database\Factories\ReinsurerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinsurers extends Model
{
    use HasFactory;

    //protected $table = 'reinsurers';

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
        /* 'name',
        'country_id',
        //'city',
        'email',
        'phone_one',
        'phone_two',
        'phone_three',
        //'extent',
        'reference',
        'contact_id',
        'position_id',
        'region_id' */

    ];

    protected static function newFactory()
    {
        return ReinsurerFactory::new();
    }

    public function reference()
    {
        return $this->belongsTo(ReinsurerReferences::class, 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function bussines()
    {
        //return $this->belongsTo(Bussines::class, 'reinsurer_bussines','reinsurer_id');
        return $this->hasMany(Bussines::class, 'reinsurer_id');
    }

    public function excluye()
    {
        //return $this->belongsToMany(Excluye::class, 'reinsurer_excluyes','reinsurer_id');
        return $this->hasMany(ReinsurerExcluye::class, 'reinsurer_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        //return $this->belongsToMany(Region::class, 'reinsurer_regions', 'reinsurer_id');
        return $this->belongsTo(Region::class);
    }

    public function file()
    {
        return $this->morphMany(File::class, 'model');
    }
}
