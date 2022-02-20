<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class CourseDiscount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'course_id',
            'price',
            'date',
        ];

        protected $dates = [ 'date' ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getFormattedDateAttribute()
    {
        return $this->date->format('d M Y');
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

