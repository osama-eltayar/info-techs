<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Speaker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name',
            'image',
            'title',
            'speciality_id',
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


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

