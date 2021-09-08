<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @method static self create( array $data )
 */
class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            "name_en",
            "name_ar",
            "country_id",
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


}

