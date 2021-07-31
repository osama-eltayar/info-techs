<?php

namespace App\Models;

use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class Organization extends Model
{
    use HasFactory;
    use HasFiles;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'name',
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
        return $this->hasMany(Course::class);
    }


}

