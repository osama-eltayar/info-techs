<?php

namespace App\Models;

use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class Country extends Model
{
    use HasFactory;
    use HasFilter;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'name'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################



    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function cities()
    {
        return $this->hasMany(City::class);
    }

}

