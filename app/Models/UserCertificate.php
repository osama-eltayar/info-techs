<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class UserCertificate extends Model
{
    use HasFactory;
    use HasFiles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'course_id',
            'user_id',
            'available_at',
            'path'
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getDownloadUrlAttribute()
    {
        return $this->getDownloadFileUrl($this->path);
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

