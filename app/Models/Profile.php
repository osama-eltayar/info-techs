<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create(array $data)
 */
class Profile extends Model
{
    use HasFactory, HasFiles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title',
        'nationality_id',
        'job',
        'mobile',
        'saudi_council',
        'image',
        'speciality_id',
        'country_id',
        'city_id',
        'rank_id'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getImageUrlAttribute()
    {
        return $this->getFileUrl($this->image);
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Country::class,'nationality_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }


}

