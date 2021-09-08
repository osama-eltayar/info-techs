<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name_ar',
            'name_en',
            'title',
            'speciality_id'
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
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_people');
    }


}

