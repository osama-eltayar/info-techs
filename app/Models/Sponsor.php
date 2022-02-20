<?php

namespace App\Models;

use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\SponsorController;
use App\Traits\HasFiles;
use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Sponsor extends Model
{
    use HasFactory,HasFiles,HasFilter;

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
            'logo',
            'mobile',
            'email',
            'country_id',
            'city_id'
        ];

    protected $appends = ['name'];

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

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_sponsors');
    }

    public function material()
    {
        return $this->hasOne(SponsorMaterial::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}

