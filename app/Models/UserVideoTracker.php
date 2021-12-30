<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class UserVideoTracker extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'user_id', 'course_id', 'trackable_id', 'trackable_type', 'time_progress', 'check_point'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################
    public function scopeForUser($query,$userId)
    {
        return $query->where('user_id',$userId);
    }


    //########################################### Relations ################################################
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function trackable()
    {
        return $this->morphTo();
    }
}

