<?php

namespace App\Models;

use Carbon\Carbon;
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
            'price',
            'cme_count',
            'certificate',
            'type_id',
            "start_date",
            "end_date",
            'hours_count',
            'from',
            'to',
            'organization_id',
            'seats',
            'title_en',
            'title_ar',
            'description_en',
            'description_ar',
            'certificate_image',
            'location',
            'address',
            'published_at',
            'is_views_hidden',
            'speciality_id',
            'country_id',
            'city_id'
        ];

    protected $dates = [ 'start_date', 'end_date', 'from', 'to','published_at' ];

    //########################################### Constants ################################################
    const ONLINE_EVENT  = 1;
    const ONLINE_COURSE = 2;
    const RECORDED      = 3;
    const PHYSICAL      = 4;
    const HYBRID        = 5;

    // 
    const IN_PROGRESS = 'In progress';
    const NOT_STARTED = 'Not started';
    const FINISHED = 'Finished';

    //########################################### Accessors ################################################
    public function getStateAttribute() 
    {
        $now = Carbon::now();
        return ($this->end_date->lt($now) )? self::FINISHED : (($this->start_date->gt($now) ) ? self::NOT_STARTED : self::IN_PROGRESS);
    }

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

    public function getFormattedEndDateAttribute()
    {
        return $this->end_date->format('d M Y');
    }

    public function getFormattedFromAttribute()
    {
        return $this->from->format('h:i a');
    }

    public function getFormattedToAttribute()
    {
        return $this->to->format('h:i a');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getFormattedPublishedAtAtAttribute()
    {
        return $this->published_at->format('d/m/Y');
    }

    public function getDaysCountAttribute()
    {
        return $this->end_date->diffInDays($this->start_date);
    }

    public function isLive()
    {
        return now()->between($this->start_date,$this->end_date);
    }

    public function isEnded()
    {
        return now()->gt($this->end_date);
    }

    public function getTitleAttribute()
    {
        return $this->{getLocalizeAttribute('title')};
    }

    public function getDescriptionAttribute()
    {
        return $this->{getLocalizeAttribute('description')};
    }

    public function successNeededMinutes()
    {
        return round(($this->certificate / 100) * $this->duration )  ;
    }

    public function getSpecialitiesStringAttribute()
    {
        return implode(', ', $this->specialities->pluck('name')->toArray());
    }

    public function getTotalPaidAmountAttribute()
    {
        return $this->paidShoppingCarts->sum('pivot.price');
    }

    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function discounts()
    {
        return $this->hasMany(CourseDiscount::class);
    }

    public function activeDiscount()
    {
        return $this->hasOne(CourseDiscount::class)->where(function ($query){
            $query->whereNull('date')->orWhere('date','>',now());
        });
    }

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class,'course_people');
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
        return $this->belongsToMany(Sponsor::class, 'course_sponsors')->withPivot('type','level');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function favouriteAuthUser()
    {
        return $this->belongsToMany(User::class, 'user_favourite_courses')
                    ->where('users.id', auth()->id());
    }

    public function registeredUsers()
    {
        return $this->belongsToMany(User::class, 'user_registered_course')->withTimestamps();
    }

    public function registeredAuthUser()
    {
        return $this->registeredUsers()->where('users.id', auth()->id());
    }

    public function shoppingCarts()
    {
        return $this->belongsToMany(User::class, ShoppingCart::class)->withPivot('price','paid_at')->withTimestamps();
    }

    public function paidShoppingCarts()
    {
        return $this->shoppingCarts()->whereNotNull('paid_at');
    }

    public function shoppingCartAuthUser()
    {
        return $this->shoppingCarts()->where('users.id', auth()->id());
    }

    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function sessions()
    {
        return $this->hasMany(CourseSession::class);
    }

    public function certificates()
    {
        return $this->hasMany(UserCertificate::class);
    }

    public function views()
    {
        return $this->hasMany(CourseView::class);
    }

    public function trackers()
    {
        return $this->hasMany(UserVideoTracker::class);
    }

    public function authUserTrackers()
    {
        return $this->hasMany(UserVideoTracker::class)->where('user_id',\auth()->id());
    }
}
