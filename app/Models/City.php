<?php

namespace App\Models;

use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/**
 * @method static self create( array $data )
 */
class City extends Model
{
    use HasFactory;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name',
            "country_id",
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################



    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


}

