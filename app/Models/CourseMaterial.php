<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class CourseMaterial extends Model
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
            'path',
            'mime_type',
            'course_id',
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    public function getDownloadUrlAttribute()
    {
        return $this->getFileUrl($this->path);
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

