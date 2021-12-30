<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class CourseVideo extends Model
{
    use HasFactory, HasFiles;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'name_ar',
        'name_en',
        'path',
        'mime_type',
        'size',
        'duration',
        'is_free',
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getUrlAttribute()
    {
        return $this->getFileUrl($this->path);
    }

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    public function disk()
    {
        return 'video';
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################
    public function scopeFree($query)
    {
        return $query->where('is_free',1);
    }


    //########################################### Relations ################################################
    public function trackers()
    {
        return $this->morphMany(UserVideoTracker::class,'trackable');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


}

