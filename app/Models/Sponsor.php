<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static self create( array $data )
 */
class Sponsor extends Model
{
    use HasFactory,HasFiles;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable
        = [
            'name',
            'description',
            'logo'
        ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################
    public function getLogoUrlAttribute()
    {
        return $this->getFileUrl($this->logo);
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function courses()
    {
        return $this->belongsToMany(Course::class,'course_sponsors');
    }

}

