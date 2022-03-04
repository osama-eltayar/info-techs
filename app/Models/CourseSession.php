<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class CourseSession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'zoom_meeting_id',
            'zoom_meeting_password',
            'course_id',
            'name',
            'duration',
            'start_at',
            'end_at'
        ];

    protected $dates = [ 'start_at','end_at' ];

    const ONLINE   = 1;
    const PHYSICAL = 2;


    //########################################### Constants ################################################


    //########################################### Accessors ################################################

    public function getZoomMeetingPasswordAttribute( $value )
    {
        if ($this->attributes['zoom_meeting_password'])
            return decrypt($value);
        return null;
    }

    public function getParsedDurationAttribute()
    {
        return parseSessionDuration($this->duration);
    }


    //########################################### Mutators #################################################

    public function setZoomMeetingPasswordAttribute( $value )
    {
        return $this->attributes[ 'zoom_meeting_password' ] = encrypt($value);
    }


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function trackers()
    {
        return $this->morphMany(UserVideoTracker::class,'trackable');
    }


}

