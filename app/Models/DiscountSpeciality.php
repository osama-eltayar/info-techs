<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DiscountSpeciality extends Pivot
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'speciality_id','discount_id'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

}
