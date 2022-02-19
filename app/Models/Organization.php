<?php

namespace App\Models;

use App\Http\Controllers\Admin\OwnerController;
use App\Traits\HasFiles;
use Filter\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

/**
 * @method static self create(array $data)
 */
class Organization extends Model
{
    use HasFactory;
    use HasFiles;
    use HasFilter;
    use SoftDeletes;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
        'material',
        'user_id',
        'city_id',
        'country_id',
        'mobile'
    ];

    protected $appends = ['name'];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################

    public function getLogoUrlAttribute()
    {
        return $this->getFileUrl($this->logo);
    }

    public function getMaterialUrlAttribute()
    {
        return action([OwnerController::class,'downloadMaterial'],$this->id);
    }

    public function getMaterialSizeAttribute()
    {
        return formatSizeUnits(Storage::size($this->material));
    }

    public function getNameAttribute()
    {
        return $this->{getLocalizeAttribute('name')};
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}

