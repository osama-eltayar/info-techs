<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Speaker extends Model
{
    use HasFactory;
    use HasFiles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name_ar',
            'name_en',
            'image',
            'title_ar',
            'title_en',
            'speciality_id',
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    public function getTitleAttribute()
    {
        return $this->{getLocalizeAttribute('title')};
    }

    public function getImageUrlAttribute()
    {
        return $this->getFileUrl($this->image);
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

}

