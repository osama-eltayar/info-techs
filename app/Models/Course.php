<?php

namespace App\Models;

use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static self create( array $data )
 */
class Course extends Model
{
    use HasFactory;
    use HasFilter;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'title',
            'price',
            'description',
            'cme_count',
            'certificate',
            'type_id',
            "start_date",
            "end_date",
            'hours_count',
            'from',
            'to',
            'organization_id',
            'seats'
        ];

    protected $dates = [ 'start_date', 'end_date', 'from', 'to' ];

    //########################################### Constants ################################################
    const ONLINE_EVENT  = 1;
    const ONLINE_COURSE = 2;
    const RECORDED      = 3;
    const PHYSICAL      = 4;
    const HYBRID        = 5;

    //########################################### Accessors ################################################
    public function isOnlineEvent()
    {
        return $this->type_id == self::ONLINE_EVENT;
    }

    public function isOnlineCourse()
    {
        return $this->type_id == self::ONLINE_COURSE;
    }

    public function isRecorded()
    {
        return $this->type_id == self::RECORDED;
    }

    public function isPhysical()
    {
        return $this->type_id == self::PHYSICAL;
    }

    public function isHybrid()
    {
        return $this->type_id == self::HYBRID;
    }

    public function getTypeStringAttribute()
    {
        return getAttributeStringByReflection(self::class, $this->type_id);
    }

    public function getTypeClassNameAttribute()
    {
        $classes = [
            self::ONLINE_EVENT  => 'status-1',
            self::ONLINE_COURSE => 'status-2',
            self::RECORDED      => 'status-2',
            self::PHYSICAL      => 'status-4',
            self::HYBRID        => 'status-5',
        ];

        return $classes[ $this->type_id ];
    }

    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('d M Y');
    }

    public function getFormattedFromAttribute()
    {
        return $this->from->format('h:i a');
    }

    public function getFormattedToAttribute()
    {
        return $this->to->format('h:i a');
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function discounts()
    {
        return $this->hasMany(CourseDiscount::class);
    }

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function people()
    {
        return $this->hasMany(CoursePerson::class);
    }

    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'course_speakers');
    }

    public function specialities()
    {
        return $this->belongsToMany(Speciality::class, 'course_specialities');
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'course_sponsors');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function favouriteAuthUser()
    {
        return $this->belongsToMany(User::class,'user_favourite_courses')
                    ->where('users.id',auth()->id());
    }

    public function registeredUsers()
    {
        return $this->belongsToMany(User::class,'user_registered_course')->withTimestamps();
    }

    public function registeredAuthUser()
    {
        return $this->registeredUsers()->where('users.id',Auth::user()->id);
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function sessions()
    {
        return $this->hasMany(CourseSession::class);
    }
}
