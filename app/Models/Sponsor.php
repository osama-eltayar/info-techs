<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Sponsor extends Model
{
    use HasFactory,HasFiles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name_en',
            'name_ar',
            'description_en',
            'description_ar',
            'logo'
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getLogoUrlAttribute()
    {
        return $this->getFileUrl($this->logo);
    }

    public function getTitleAttribute()
    {
        return $this->{getLocalizeAttribute('title')};
    }

    public function getDescriptionAttribute()
    {
        return $this->{getLocalizeAttribute('description')};
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_sponsors');
    }

}

