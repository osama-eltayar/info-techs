<?php

namespace App\Models;

use App\Traits\HasFiles;
use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Speaker extends Model
{
    use HasFactory;
    use HasFiles;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
            'name_ar',
            'name_en',
            'image',
            'mobile',
            'bio',
            'position',
            'user_title_id',
            'speciality_id',
            'country_id',
            'city_id'
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    // public function getTitleAttribute()
    // {
    //     return $this->{getLocalizeAttribute('title')};
    // }

    public function getImageUrlAttribute()
    {
        return $this->getFileUrl($this->image);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getCoursesCountAttribute()
    {
        return $this->courses()->count();
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_speakers');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function title()
    {
        return $this->belongsTo(UserTitle::class, 'user_title_id');
    }
}

